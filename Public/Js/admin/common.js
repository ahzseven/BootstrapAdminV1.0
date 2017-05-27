/**
 * 公共js文件
 */
$(function(){
//刷新当前页面
// $("#lay-f").click(function(){
// 	//location.reload();
// 	location.href  =  location.href;
// });

	//添加按钮跳转操作
	$("#button-add").click(function(){
		location.href = jumpUrl.add_url;
	});

	//添加表单提交操作
	$("#admin-btn").click(function(){
		var data = $("#admin-form").serializeArray();  //序列化表格元素,返回JSON数据对象
		postData = {};
		$(data).each(function(i) {
			postData[this.name] = this.value;
		});
		console.log(postData);
		     url = jumpUrl.save_url;
		jump_url = jumpUrl.jump_url;
		$.post(url, postData, function(result){
			if (result.status == 1) {
				return dialog.success(result.message,jump_url);
			}
			if (result.status == 0) {
				return dialog.error(result.message);
			}
		},"JSON");
	});

//跳转到编辑页面
$(".edit-btn").click(function(){
	var  id = $(this).attr('edn');
	var url = jumpUrl.edit_url+"&id="+id;
	   location.href = url;
});

// $(".admin-del").click(function(){
// 	var id = $(this).attr('edn');
// 	   url = jumpUrl.edit_url;
// 	  data = {};
// 	  data['id'] = id;
// 	  dlt(url,data);
// });

//删除操作
$(".admin-del").on('click',function(){
	var id      = $(this).attr('user-id');
	var name    = $(this).attr('name');
	var message = $(this).attr('message');
	var sta     = $(this).attr('status');
	var url     = jumpUrl.delete_url;
	if (sta == 1) {
		var status = 0;
	} else {
		var status = 1;
	}
	data           = {};
	data['id']     = id;
	data['status'] = status;

	layer.open({
		type : 0,
		title : '提交数据',
		btn : ['yes','no'],
		icon : 3,
		closeBen : 2,
		content : '是否确定'+message+':'+name,
		scrollbar : true,
		yes : function(){
			//执行跳转
			dlt(url,data);
		},
	});

});
function dlt(url,data){
	$.post(url, data, function(res){
		if (res.status == 1) {
			return dialog.success(res.message,'');
		} else {
			return dialog.error(res.message);
		}
	},"JSON");
}

//退出方法
$('.logout').click(function(){
	var url = jump.out_url;
	layer.open({
		type : 0,
		content : '确定退出系统?',
		icon : 3,
		area : ['420px','320'],
		shade : 0.6,
		offset : '220px',
		Boolean : true,
		btn : ['确定','取消'],
		scrollbar : true,
		yes : function(){
			//执行跳转
			window.location.href = url;
		},
	});
});

/**
 * push推送文章
 */
// $('#admin-push').click(function(){
// 	var id = $('#select-push').val();
// 	if (id == 0) {
// 		return dialog.error('选择推荐位');
// 	}
// 	push = {};
// 	data = {};
// 	$("input[name='pushcheck']:checked").each(function(i){
// 		push[i] = $(this).val();
// 	});

// 	data['push'] = push;
// 	data['position_id'] = id;
// 	var url = jumpUrl.push_url;
// 	$.post(url, data, function(result){
// 		if (result.status == 1) {
// 			//推送成功
// 			return dialog.success(result.message, result['data']['jump_url']);
// 		}
// 		if (result.status == 0) {
// 			//推送失败
// 			return dialog.error(result.message);
// 		}
// 	},"JSON");
// });


});


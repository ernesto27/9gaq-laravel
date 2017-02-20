$(function(){
	var App = {};


	App.Comments = {
		init: function(){
			//alert('init comments app');
			this.events();
		},

		events: function(){
			$('.reply-comment').on('click', this.showFormReplyComment);			
		},

		showFormReplyComment: function(){
			var that = $(this);
			var formClone = $('.form-comment').first().clone();
			var commentID = that.data('commentid');
			formClone.find('[name="parent_id"]').val(commentID);
			that.closest('.wrapper-comment').after(formClone);
		
		}
	}


	App.Comments.init();
});
$(function(){
	var App = {};


	App.Comments = {
		init: function(){
			this.events();
		},

		events: function(){
			$('.reply-comment').on('click', this.showFormReplyComment);
			$('.select-category').on('change', this.filterPostsByCategory);				
		},

		showFormReplyComment: function(){
			var that = $(this);
			var formClone = $('.form-comment').first().clone();
			var commentID = that.data('commentid');
			formClone.find('[name="parent_id"]').val(commentID);
			that.closest('.wrapper-comment').after(formClone);
		},

		filterPostsByCategory: function(){
			var categoryID = this.value;
			window.location = '/posts?category=' + categoryID;
		}
	}


	App.Comments.init();
});
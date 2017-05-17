$(document).ready(function() {
	var addedCategoriesText;
	var addedCategoriesIds;

	var addBtn = $('.AddCAt');
	addedCategoriesIds = $('#categories');
	addedCategoriesText = $('.catName ul');
	addBtn.on('click', function (e) {
		e.preventDefault();

		var select = $('#category');
		var selectedCategoryId = select.options[select.selectedIndex].value;
		var selectedCategoryName = select.options[select.selectedIndex].text;
		if(addedCategoriesIds.val().split(",").indexOf(selectedCategoryId) != -1){
			return;
		}
		if(addedCategoriesIds.val().length > 0){
			addedCategoriesIds.val() = addedCategoriesIds + ',' + selectedCategoryId;
		} else {
			addedCategoriesIds.val() = selectedCategoryId;
		}
		var li = document.createElement('li');
		var a = document.createElement('a');
		a.href = '#';
		a.innerText = selectedCategoryName;
		a.dataset['category_id'] = selectedCategoryId;
		li.html(a);
		addedCategoriesText.html(li);
	});

	// addedCategoriesText = $('.catName ul');
	//
	// for(i = 0; i < addedCategoriesText.length; i++) {
	// 	addedCategoriesText[i].on('click', function() {
	//
	// 	});
	// }
});

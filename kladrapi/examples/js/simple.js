$(document).ready(function(){

	$(function () {
		$('[name="street"]').kladr({
			//oneString: true,
			type: $.kladr.type.street,
	        parentType: $.kladr.type.city,
	        parentId: '5200000100000'
			//type: $.kladr.type.city
		});
		$('[name="building"]').kladr({
			//oneString: true,
			type: $.kladr.type.building,
	        parentType: $.kladr.type.street,
	        parentInput: '[name="street"]',
			//type: $.kladr.type.city
		});

	});

})
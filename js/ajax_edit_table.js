$(document)
	.ready(function () {
		$(".edit_td")
			.click(function () {
				var ID = $(this)
					.attr('id');
				$("#label_" + ID)
					.hide();
				$("#input_" + ID)
					.show();
			})
			.change(function () {
				var TDID = $(this)
					.attr('id');
				alert(TDID);
				var TD_ID = TDID.split("-", 2);
				var ID = TD_ID[1];
				var FIELD = TD_ID[0];
				var DATA = $("#input_" + TDID)
					.val();
				var dataString = 'id=' + ID + '&field=' + FIELD + '&value=' + DATA;
				$.ajax({
					type: "POST",
					url: "cms/update_ajax.php",
					data: dataString,
					cache: false,
					success: function (html) {
				alert(html);
						$("#label_" + TDID)
							.html(DATA);
					},
					error: function (DATA) {
						alert("Es ist ein Fehler aufgetreten!");
					}
				});
			});
		// Klick innerhalb des Labels
		$(".editbox")
			.mouseup(function () {
				return false
			});
		// Klick auserhalb des Inputfeldes
		$(document)
			.mouseup(function () {
				$(".editbox")
					.hide();
				$(".text")
					.show();
			});
	});
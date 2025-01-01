// javascript jQuery

$(document).ready(function() {
	// Function to update the news ticker with a random variable
	function updateNewsTicker() {
		$.getJSON('assets/json/bash_variables.json', function(data) {
			var variables = data.variables;

			// Select a random variable
			var random_variable_key = Math.floor(Math.random() * Object.keys(variables).length);
			var random_variable_name = Object.keys(variables)[random_variable_key];
			var random_variable = variables[random_variable_name];

			$('#news-ticker').text(random_variable_name + ': ' + random_variable.description +
				' (Used for: ' + random_variable.used_for + ')');
		});
	}


	// Update the news ticker every 5 seconds
	updateNewsTicker();
	setInterval(updateNewsTicker, 5000); // Change interval as needed

	function swap_text(id1, id2) {
		var elem1 = document.getElementById(id1);
		var elem2 = document.getElementById(id2);
		var text1 = elem1.textContent;
		var text2 = elem2.textContent;
		elem1.textContent = text2;
		elem2.textContent = text1;
	}

});


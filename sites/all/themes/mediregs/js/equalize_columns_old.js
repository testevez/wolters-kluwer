// Equalize Column Heights - All Pages - Mediregs Theme

$(document).ready(function($) {		  

	function log(msg) {
		setTimeout(function() {
			throw new Error(msg);
		}, 0);
	}
	
	// Resursive function to keep balancing the columns until the content is stabilized, calling once may not
	// garentee they remain balanced as content is loaded asynchronously
	function equalize_page_columns() {
	
		// Find the sections within each region, three regions (left, center, right), also note each regions is a column
		var left_region = document.querySelectorAll("div.region-sidebar-first")[0];
		var sections_array_left = left_region.getElementsByTagName('section');
	
		var center_region = document.getElementById("content-column");
		var sections_array_center = center_region.getElementsByTagName('section');
	
		var right_region = document.querySelectorAll("div.region-sidebar-second")[0];
		var sections_array_right = right_region.getElementsByTagName('section');
	
		// Grab the tallest column height of the three regions
		var tallest = document.getElementById("content-column").parentNode.offsetHeight;
	
		// Only execute if the columns are not aligned
		if (tallest != left_region.offsetHeight || tallest != right_region.offsetHeight) {
			//log('Unbalanced columns, balancing..');
			
			sections_array_left[sections_array_left.length - 1].childNodes[0].setAttribute('style', 'padding-bottom:0px');
			try {
				sections_array_center[sections_array_center.length - 1].childNodes[0].setAttribute('style', 'padding-bottom:0px');
			}
			catch (err) {
			}
			sections_array_right[sections_array_right.length - 1].childNodes[0].setAttribute('style', 'padding-bottom:0px');
			tallest = document.getElementById("content-column").parentNode.offsetHeight;
			
			// height to add to each section	
			var padding_left = tallest - left_region.offsetHeight;
			sections_array_left[sections_array_left.length - 1].childNodes[0].setAttribute('style', 'padding-bottom:' + padding_left + 'px');
			
			// Check for center single column or grid center column
			var grid_region = document.querySelectorAll("div.four-4x25")[0];
			if (grid_region !== undefined) { // Handle inner 2 column grid region on some pages
				var tallest_grid = grid_region.offsetHeight;
				var height_difference = tallest - document.getElementById("content-column").offsetHeight; // difference in height from main 3 col to the 2 subcolumns
				var left_grid = document.querySelectorAll("div.row-1")[0];
				var sections_array_left_grid = left_grid.getElementsByTagName('section');
				var right_grid = document.querySelectorAll("div.row-2")[0];
				var sections_array_right_grid = right_grid.getElementsByTagName('section');

				var padding_left_grid = tallest_grid - left_grid.offsetHeight + height_difference;
				sections_array_left_grid[sections_array_left_grid.length - 1].childNodes[0].setAttribute('style', 'padding-bottom:' + padding_left_grid + 'px');
				var padding_right_grid = tallest_grid - right_grid.offsetHeight + height_difference;
				sections_array_right_grid[sections_array_right_grid.length - 1].childNodes[0].setAttribute('style', 'padding-bottom:' + padding_right_grid + 'px');
			}
			else { // without grid
				var padding_center = tallest - center_region.offsetHeight;
				try {
					sections_array_center[sections_array_center.length - 1].childNodes[0].setAttribute('style', 'padding-bottom:' + padding_center + 'px');
				}
				catch (err) {
					//sections_array_center[sections_array_center.length - 1].childNodes[1].setAttribute('style', 'padding-bottom:' + padding_center + 'px');
				}
			}
			var padding_right = tallest - right_region.offsetHeight;
			sections_array_right[sections_array_right.length - 1].childNodes[0].setAttribute('style', 'padding-bottom:' + padding_right + 'px');
			
			// Double check content did not get updated messing up the newly adjusted columns
			setTimeout(function(){equalize_page_columns()},5000);
			
		}
		else {
			//log("Columns Balanced - Exit");
		}

	}

	// Call the function apon load, give 1.5 second delay to ensure other javascript is finished executing content rendering
	setTimeout(function(){equalize_page_columns()},2500);

});



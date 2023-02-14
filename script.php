<?php 
	// First of all i have to check if i am receiving
	// the superglobal $_FILES
	if(isset($_FILES['files'])){
		// If so, then i have to set the uploads path.
		$folder = "/tueuwut";
		// The $_FILES variable holds a multidimensional array.
		// That means that each image property is an array.
		// In order to store the images in our folder, i need
		// the image name, and the temporary stored location.
		$names = $_FILES['files']['name']; // The $names variable will hold an array
		// of the images names;
		$tmp_names = $_FILES['files']['tmp_name']; // And the $tmp_names holds
		// an array of the tempory locations where the images were uploaded.

		// Next i need to combine those two arrays into one,
		// so i can loop trough and move the files to the uploads folder.
		$upload_data = array_combine($tmp_names, $names);
		// Now this is important. 
		// The array_combine function returns an associative array, 
		// where the keys are the items of the first argument,
		// and the values are the items of the second argument.
		// So the order of the arguments matters.
highlight_string("<?php " . var_export($upload_data, true) . ";?>");
		// Next i will loop trhiugh our new array, and move every file
		// to the uploads folder.
		foreach ($upload_data as $temp_folder => $file) {
			move_uploaded_file($temp_folder, $folder.$file);
		}

	}		

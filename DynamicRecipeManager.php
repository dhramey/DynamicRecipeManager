<?php
?>

<!DOCTYPE html>
<html>
<head>
	<title> Daniel Ramey Designs - Intro to PHP Event Form </title>
    	<!--
		Author: Daniel Ramey
		Date Created: 2018
    	-->
	<meta name="description" content="DR Designs is a web presence
		reflecting the web, graphic, and process improvement projects
		of Daniel Ramey." />
	<meta name="keywords" content="Daniel Ramey" />
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<style>
		* {
			box-sizing: border-box;
			/*font-family: "Tahoma", "Verdana", "Segoe", sans-serif;*/
			margin: 0;
		}
		main {
			align-items: center;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}
		.recipeBox {
			width: 60%;
		}
		button {
			cursor: pointer;
		}
		
		header {
			align-items: center;
			background-color: #009999;
			display: flex;
			height: 50px;
			justify-content: flex-end;
			margin-bottom: 50px;
			overflow: hidden;
			position: sticky;
			top: 0;
			width: 100%;
			z-index: 10;
		}		
		header > div {
			margin: 0 25px;
		}
		.logoDisplay {
			color: white;
			font-size: 2em;
			text-decoration: none;
		}
		
		/* Recipe Image and Title Section */
		.recipeImageAndTitleBox {
			align-items: center;
			color: #ff5050;
			display: flex;
			flex-direction: row;
			justify-content: space-around;
			margin-bottom: 50px;
		}
		.recipeImageBox, .recipeTitleBox {
			flex-basis: 350px;
			height: 350px;
		}
		.recipeImageBox {
			background-color: #ff5050;
			border-radius: 50%;
			overflow: hidden;
		}
		.recipeImageBox img {
			height: 100%;
			object-fit: cover;
			width: 100%;
		}
		.recipeTitleBox {
			align-items: center;
			display: flex;
			font-size: 2.25em;
			text-align: right;
		}
		
		/* Recipe Information Section */		
		.recipeInfoBox {
			align-items: center;
			color: white;
			display: flex;
			font-size: 1.1em;
			font-weight: bold;
			justify-content: space-between;
			margin-bottom: 50px;
		}
		.recipeInfoBox > div {
			align-items: center;
			background-color: #009999;
			border-radius: 50%;
			display: flex;
			flex-direction: column;
			flex-basis: 115px;
			height: 115px;
			justify-content: center;
		}
		.recipeInfoNumber {
			font-size: 1.75em;
		}
		
		/* Recipe Description and Servings Section */
		.recipeDescriptionAndServingsBox {
			align-items: center;
			display: flex;
			flex-direction: row;
			font-size: 1.1em;
			font-weight: bold;
			justify-content: space-around;
			margin-bottom: 50px;
		}
		
		.recipeDescriptionBox {
			color: black;
			flex-basis: 60%;
		}
		.recipeDescriptionBox p {
			margin-bottom: 15px;
		}
		.recipeDescriptionBox > p {
			color: #009999;
			font-size: 1.25em;
		}
		
		.recipeServingsBox {
			align-items: center;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}
		.recipeServingsNumberBox {
			align-items: center;
			background-color: #ff5050;
			border-radius: 50%;
			color: white;
			display: flex;
			flex-direction: column;
			font-size: 1.25em;
			width: 200px;
			height: 200px;
			justify-content: center;
			margin-bottom: 10px;
		}
		.recipeServingNumber {
			font-size: 2.75em;
		}
		.recipeServingAdjustmentsBox button {
			background-color: white;
			border: none;
			border-color: white;
			border-radius: 7px;
			color: #ff5050;
			font-size: .6em;
			font-weight: bold;
			height: 25px;
			margin-top: 15px;
			width: 65px;
		}
		#originalServingButton {
			background-color: #009999;
			border: none;
			border-color: #009999;
			border-radius: 8px;
			color: white;
			font-size: .6em;
			font-weight: bold;
			height: 30px;
			width: 150px;
		}
		
		/* Recipe Ingredients and Directions Section */
		.recipeIngredientsAndDirectionsBox {
			display: flex;
			flex-direction: row;
			font-weight: bold;
			margin-bottom: 50px;
		}
		.recipeIngredientsAndDirectionsBox button {
			font-size: 1.5em;
			font-weight: bold;
		}
		
		.recipeIngredientsBox {
			flex-basis: 30%;
			margin-right: 25px;
		}
		.recipeIngredientsBox > button {
			background-color: #ff5050;
			border: none;
			border-color: #ff5050;
			border-radius: 15px;
			color: white;
			height: 70px;
			margin-bottom: -15px;
			width: 175px;
		}
		.recipeIngredientsText {
			border: solid thick #009999;
			border-radius: 15px;
			padding: 25px;
		}
		.recipeIngredientsText p {
			margin-bottom: 15px;
		}
		.recipeIngredientsAmount {
			color: #ff5050;
			font-size: 1.25em;
		}
		
		.recipeDirectionsBox {
			flex-basis: 70%;
		}
		.recipeDirectionsBox > button {
			background-color: #ff5050;
			border: none;
			border-color: #ff5050;
			border-radius: 15px;
			color: white;
			height: 70px;
			margin-bottom: -15px;
			width: 250px;			
		}
		.recipeDirectionsText {
			border: solid thick #009999;
			border-radius: 15px;
			padding: 25px;
		}
		.recipeDirectionsText div {
			display: flex;
			flex-direction: row;
			margin-bottom: 15px;
		}
		.recipeDirectionsText input {
			margin-right: 15px;
		}
		.checkboxStyle {
			transform: scale(1.5, 1.5);
		}
	</style>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>

		function addRecipeDescription(inRecipeDescription) {
			$("#recipeDescriptionText").html("");
			
			$.each(inRecipeDescription, function(index, value){
				$("#recipeDescriptionText").append(
					"<p>" + value + "</p>"
				);
			});
		}
		
		function addRecipeIngredients(inOriginalIngredientsAmount, inOriginalIngredientsMeasurement, inRecipeIngredientsName) {
			$(".recipeIngredientsText").html("");
			
			for(var i=0; i<inOriginalIngredientsAmount.length; i++) {
				$(".recipeIngredientsText").append(
					"<p> <span class='recipeIngredientsAmount'>" + inOriginalIngredientsAmount[i] + "</span> " + inOriginalIngredientsMeasurement[i] + " " + inRecipeIngredientsName[i] + "</p>"
				);				
			}
		}
		
		function addRecipeDirections(inRecipeDirections) {
			$(".recipeDirectionsText").html("");
			
			$.each(inRecipeDirections, function(index, value) {
				$(".recipeDirectionsText").append(
					"<div> <input type='checkbox' class='checkboxStyle' /> <p>" + value + "</p> </div>"
				);
			});
		}
		
		function validateServingSize(inServingSize) {
			//alert("qwerty");
			if( inServingSize >= 1 && inServingSize <= 12 && Number.isInteger(inServingSize) ) {
				return true;
			}
			else {
				return false;
			}
		}
		
		function doubleServingSize(inServingSize) {
			if( validateServingSize( (inServingSize * 2) ) ) {
				newServingSize = inServingSize * 2;
				return newServingSize;
			}
			else {
				return false;
			}
		}
		
		function doubleIngredientsAmount(inIngredientsAmount) {
			outIngredientsAmount = $.map(inIngredientsAmount, function(value, index) {
				return (value * 2);
			});
			outIngredientsAmount.forEach( function(value, index) { 
				if (value == 0) outIngredientsAmount[index] = ""; 
			});
			return outIngredientsAmount;
		}
		
		function halfServingSize(inServingSize) {
			if( validateServingSize( (inServingSize / 2) ) ) {
				newServingSize = inServingSize / 2;
				return newServingSize;
			}
			else {
				return false;
			}
		}
		
		function halfIngredientsAmount(inIngredientsAmount) {
			outIngredientsAmount = $.map(inIngredientsAmount, function(value, index) {
				return (value / 2);
			});
			outIngredientsAmount.forEach( function(value, index) { 
				if (value == 0) outIngredientsAmount[index] = ""; 
			});
			return outIngredientsAmount;
		}
		
// AJAX REQUESTS		
		function getRecipeData(inURL) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var recipeObject = JSON.parse(this.responseText);
					//alert(recipeObject.name);
					
					$("#recipeImageText").html(
						"<img src='" + recipeObject.picture + "' />" 
					);
					$("#recipeTitleText").html(recipeObject.name);
					$("#recipeDifficultyText").html(recipeObject.difficulty);
					$("#recipeIngredientText").html(recipeObject.ingredientsNumber);
					$("#recipeHoursText").html(recipeObject.cookTimeHours);
					$("#recipeMinutesText").html(recipeObject.cookTimeMinutes);
					$("#recipeCaloriesText").html(recipeObject.calories);
					$("#recipeRatingText").html(recipeObject.rating);
					addRecipeDescription(recipeObject.description);
					$(".recipeServingNumber").html(recipeObject.servings);
					
					addRecipeDirections(recipeObject.recipeDirectionsSteps);
					addRecipeIngredients(
						recipeObject.originalIngredientsAmount, recipeObject.originalIngredientsMeasurement, recipeObject.recipeIngredientsName
					);
					
					/*
					var outRecipeDescription = "";
					for (x in recipeObject.description) {
						//alert(recipeObject.description[x]);
						outRecipeDescription += "<p>" + recipeObject.description[x] + "</p>";
					}
					$("#recipeDescriptionText").html(outRecipeDescription);
					*/
				}
			}
			xmlhttp.open("GET", inURL, true);
			xmlhttp.send();
		}
		
		function doubleRecipe(inURL) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var recipeObject = JSON.parse(this.responseText);
					
					var newServingSize = recipeObject.servings;
					newServingSize = doubleServingSize(newServingSize);
					$(".recipeServingNumber").html(newServingSize);
					
					var newIngredientAmounts = recipeObject.originalIngredientsAmount;
					newIngredientAmounts = doubleIngredientsAmount(newIngredientAmounts);
					addRecipeIngredients(
						newIngredientAmounts, recipeObject.originalIngredientsMeasurement, recipeObject.recipeIngredientsName
					);					
				}
			}
			xmlhttp.open("GET", inURL, true);
			xmlhttp.send();
		}
		
		function halfRecipe(inURL) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var recipeObject = JSON.parse(this.responseText);
					
					var newServingSize = recipeObject.servings;
					newServingSize = halfServingSize(newServingSize);
					$(".recipeServingNumber").html(newServingSize);
					
					var newIngredientAmounts = recipeObject.originalIngredientsAmount;
					newIngredientAmounts = halfIngredientsAmount(newIngredientAmounts);
					addRecipeIngredients(
						newIngredientAmounts, recipeObject.originalIngredientsMeasurement, recipeObject.recipeIngredientsName
					);					
				}
			}
			xmlhttp.open("GET", inURL, true);
			xmlhttp.send();
		}
		
		function returnToOriginalRecipe(inURL) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var recipeObject = JSON.parse(this.responseText);
					
					$(".recipeServingNumber").html(recipeObject.servings);
					
					addRecipeIngredients(
						recipeObject.originalIngredientsAmount, recipeObject.originalIngredientsMeasurement, recipeObject.recipeIngredientsName
					);				
				}
			}
			xmlhttp.open("GET", inURL, true);
			xmlhttp.send();
		}

//ON PAGE LOAD
		$(document).ready( function() {
					
			var jsonData = "";
			
			$("#recipeDropDown").change( function() {
				if( $(this).val() == "crockpotChilli" ) {
					jsonData = "recipeCrockpotChilli.json";
					getRecipeData(jsonData);
				}
				else if( $(this).val() == "greenSaladWithCraisins" ) {
					jsonData = "recipeGreenSaladWithCraisins.json";
					getRecipeData(jsonData);
				}
				else if( $(this).val() == "garlicBread" ) {
					jsonData = "recipeGarlicBread.json";
					getRecipeData(jsonData);
				}	
			});
			
			$("#doubleServingSizeButton").click(function() {
				doubleRecipe(jsonData);
			});
			$("#halfServingSizeButton").click(function() {
				halfRecipe(jsonData);
			});
			$("#originalServingButton").click(function() {
				returnToOriginalRecipe(jsonData);
			});
			
			$(".recipeIngredientsBox div, .recipeDirectionsBox div").hide();
			
			$(".recipeIngredientsBox button").click( function() {
				$(".recipeIngredientsBox > div").slideToggle();
			});
			$(".recipeDirectionsBox button").click( function() {
				$(".recipeDirectionsBox > div").slideToggle();
			});

		});
		
	</script>
</head>
<body>
	<main>
		<header>
			<div>
				<select id="recipeDropDown">
					<option> Please Choose a Recipe... </option>
					<option value="crockpotChilli"> Crockpot Chilli </option>
					<option value="greenSaladWithCraisins"> Green Salad with Craisins </option>
					<option value="garlicBread"> Garlic Bread </option>
				</select>
			</div>
			<div>
				<a class="logoDisplay" href="#"> &#10070; </a>
			</div>
		</header>

		<div class="recipeBox">
			<div class="recipeImageAndTitleBox">
				<div class="recipeImageBox" id="recipeImageText">
					<img src="#" alt="" />
				</div>
				<div class="recipeTitleBox">
					<h1 id="recipeTitleText"></h1>
				</div>
			</div>

			<div class="recipeInfoBox">
				<div>
					<p id="recipeDifficultyText"></p>
					<p> difficulty </p>
				</div>
				<div>
					<p class="recipeInfoNumber" id="recipeIngredientText"></p>
					<p> Ingredients </p>
				</div>
				<div>
					<p> <span id="recipeHoursText"></span> hours </p>
					<p> <span id="recipeMinutesText"></span> minutes </p>
				</div>
				<div>
					<p class="recipeInfoNumber" id="recipeCaloriesText"></p>
					<p> Calories </p>
				</div>
				<div>
					<p id="recipeRatingText" ></p>
				</div>
			</div>

			<div class="recipeDescriptionAndServingsBox">
				<div class="recipeDescriptionBox">
					<p> Description: </p>
					<div id="recipeDescriptionText"></div>
				</div>
				<div>
					<div class="recipeServingsBox">
						<div class="recipeServingsNumberBox" >
							<p class="recipeServingNumber"></p>
							<p> Servings </p>
							<div class="recipeServingAdjustmentsBox">
								<button id="doubleServingSizeButton"> Double </button>
								<button id="halfServingSizeButton"> Half </button>
							</div>
						</div>
						<button id="originalServingButton"> Original Servings </button>
					</div>			
				</div>

			</div>

			<div class="recipeIngredientsAndDirectionsBox">
				<div class="recipeIngredientsBox">
					<button> Ingredients </button>
					<div class="recipeIngredientsText"></div>
				</div>
				<div class="recipeDirectionsBox">
					<button> Directions </button>
					<div class="recipeDirectionsText"></div>
				</div>
			</div>
		</div>
		
		<footer>
		</footer>
	</main>
</body>	
</html>
		
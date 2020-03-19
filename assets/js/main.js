/*
	Astral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {
  var $window = $(window),
    $body = $("body"),
    $wrapper = $("#wrapper"),
    $main = $("#main"),
    $panels = $main.children(".panel"),
    $nav = $("#nav"),
    $nav_links = $nav.children("a");

  // Breakpoints.
  breakpoints({
    xlarge: ["1281px", "1680px"],
    large: ["981px", "1280px"],
    medium: ["737px", "980px"],
    small: ["361px", "736px"],
    xsmall: [null, "360px"]
  });

  // Play initial animations on page load.
  $window.on("load", function() {
    window.setTimeout(function() {
      $body.removeClass("is-preload");
    }, 100);
  });

  // Nav.
  $nav_links.on("click", function(event) {
    var href = $(this).attr("href");

    // Not a panel link? Bail.
    // if (href.charAt(0) != "#" || $panels.filter(href).length == 0) return;

    // Prevent default.
    event.preventDefault();
    event.stopPropagation();

    // Change panels.
    if (window.location.hash != href) window.location.hash = href;
  });

  // Panels.

  // Initialize.
  (function() {
    var $panel, $link;

    // Get panel, link.
    if (window.location.hash) {
      $panel = $panels.filter(window.location.hash);
      $link = $nav_links.filter('[href="' + window.location.hash + '"]');
    }

    // No panel/link? Default to first.
    if (!$panel || $panel.length == 0) {
      $panel = $panels.first();
      $link = $nav_links.first();
    }

    // Deactivate all panels except this one.
    $panels
      .not($panel)
      .addClass("inactive")
      .hide();

    // Activate link.
    $link.addClass("active");

    // Reset scroll.
    $window.scrollTop(0);
  })();

  // Hashchange event.
  $window.on("hashchange", function(event) {
    var $panel, $link;

    // Get panel, link.
    if (window.location.hash) {
      $panel = $panels.filter(window.location.hash);
      $link = $nav_links.filter('[href="' + window.location.hash + '"]');

      // No target panel? Bail.
      if ($panel.length == 0) return;
    }

    // No panel/link? Default to first.
    else {
      $panel = $panels.first();
      $link = $nav_links.first();
    }

    // Deactivate all panels.
    $panels.addClass("inactive");

    // Deactivate all links.
    $nav_links.removeClass("active");

    // Activate target link.
    $link.addClass("active");

    // Set max/min height.
    $main
      .css("max-height", $main.height() + "px")
      .css("min-height", $main.height() + "px");

    // Delay.
    setTimeout(function() {
      // Hide all panels.
      $panels.hide();

      // Show target panel.
      $panel.show();

      // Set new max/min height.
      $main
        .css("max-height", $panel.outerHeight() + "px")
        .css("min-height", $panel.outerHeight() + "px");

      // Reset scroll.
      $window.scrollTop(0);

      // Delay.
      window.setTimeout(
        function() {
          // Activate target panel.
          $panel.removeClass("inactive");

          // Clear max/min height.
          $main.css("max-height", "").css("min-height", "");

          // IE: Refresh.
          $window.triggerHandler("--refresh");

          // Unlock.
          locked = false;
        },
        breakpoints.active("small") ? 0 : 500
      );
    }, 250);
  });

  // IE: Fixes.
  if (browser.name == "ie") {
    // Fix min-height/flexbox.
    $window.on("--refresh", function() {
      $wrapper.css("height", "auto");

      window.setTimeout(function() {
        var h = $wrapper.height(),
          wh = $window.height();

        if (h < wh) $wrapper.css("height", "100vh");
      }, 0);
    });

    $window.on("resize load", function() {
      $window.triggerHandler("--refresh");
    });

    // Fix intro pic.
    $(".panel.intro").each(function() {
      var $pic = $(this).children(".pic"),
        $img = $pic.children("img");

      $pic
        .css("background-image", "url(" + $img.attr("src") + ")")
        .css("background-size", "cover")
        .css("background-position", "center");

      $img.css("visibility", "hidden");
    });
  }
})(jQuery);

// Jeu de la vie

/* ***** GAME OF LIFE OBJECT ***** */

/**
 * Constructor for the Game of Life object
 *
//  * @author Qbit
//  * @version 0.1
//  */
// function Game(canvas, cfg) {
//   // Properties
//   this.canvas = canvas;
//   this.ctx = canvas.getContext("2d");
//   this.matrix = undefined;
//   this.round = 0;

//   // Merge of the default and delivered config.
//   var defaults = {
//     cellsX: 130,
//     cellsY: 75,
//     cellSize: 10,
//     rules: "23/3",
//     gridColor: "#faf0dc",
//     cellColor: "#ccc"
//   };
//   this.cfg = $.extend({}, defaults, cfg);

//   // Initialize the canvas and matrix.
//   this.init();
// }

// /**
//  * Prototype of the Game of Life object
//  *
//  * @author Qbit
//  * @version 0.1
//  */
// Game.prototype = {
//   /**
//    * Initializes the canvas object and the matrix.
//    */
//   init: function() {
//     // set canvas dimensions
//     this.canvas.width = this.cfg.cellsX * this.cfg.cellSize;
//     this.canvas.height = this.cfg.cellsY * this.cfg.cellSize;

//     // initialize matrix
//     this.matrix = new Array(this.cfg.cellsX);
//     for (var x = 0; x < this.matrix.length; x++) {
//       this.matrix[x] = new Array(this.cfg.cellsY);
//       for (var y = 0; y < this.matrix[x].length; y++) {
//         this.matrix[x][y] = false;
//       }
//     }

//     this.draw();
//   },

//   /**
//    * Draws the entire game on the canvas.
//    */
//   draw: function() {
//     var x, y;
//     // clear canvas and set colors
//     this.canvas.width = this.canvas.width;
//     this.ctx.strokeStyle = this.cfg.gridColor;
//     this.ctx.fillStyle = this.cfg.cellColor;

//     // draw grid
//     for (
//       x = 0.5;
//       x < this.cfg.cellsX * this.cfg.cellSize;
//       x += this.cfg.cellSize
//     ) {
//       this.ctx.moveTo(x, 0);
//       this.ctx.lineTo(x, this.cfg.cellsY * this.cfg.cellSize);
//     }

//     for (
//       y = 0.5;
//       y < this.cfg.cellsY * this.cfg.cellSize;
//       y += this.cfg.cellSize
//     ) {
//       this.ctx.moveTo(0, y);
//       this.ctx.lineTo(this.cfg.cellsX * this.cfg.cellSize, y);
//     }

//     this.ctx.stroke();

//     // draw matrix
//     for (x = 0; x < this.matrix.length; x++) {
//       for (y = 0; y < this.matrix[x].length; y++) {
//         if (this.matrix[x][y]) {
//           this.ctx.fillRect(
//             x * this.cfg.cellSize + 1,
//             y * this.cfg.cellSize + 1,
//             this.cfg.cellSize - 1,
//             this.cfg.cellSize - 1
//           );
//         }
//       }
//     }
//   },

//   /**
//    * Calculates the new state by applying the rules.
//    * All changes were made in a buffer matrix and swapped at the end.
//    */
//   step: function() {
//     // initalize buffer
//     var x, y;
//     var buffer = new Array(this.matrix.length);
//     for (x = 0; x < buffer.length; x++) {
//       buffer[x] = new Array(this.matrix[x].length);
//     }

//     // calculate one step
//     for (x = 0; x < this.matrix.length; x++) {
//       for (y = 0; y < this.matrix[x].length; y++) {
//         // count neighbours
//         var neighbours = this.countNeighbours(x, y);

//         // use rules
//         if (this.matrix[x][y]) {
//           if (neighbours == 2 || neighbours == 3) buffer[x][y] = true;
//           if (neighbours < 2 || neighbours > 3) buffer[x][y] = false;
//         } else {
//           if (neighbours == 3) buffer[x][y] = true;
//         }
//       }
//     }

//     // flip buffers
//     this.matrix = buffer;
//     this.round++;
//     this.draw();
//   },

//   /**
//    * Counts the living neighbours of the cell at the given coordinates.
//    * A cell can have up to 8 neighbours. Borders are concidered as dead.
//    *
//    * @param cx horizontal coordinates of the given cell
//    * @param cy vertical coordinates of the given cell
//    * @return the number of living neighbours
//    */
//   countNeighbours: function(cx, cy) {
//     var count = 0;

//     for (var x = cx - 1; x <= cx + 1; x++) {
//       for (var y = cy - 1; y <= cy + 1; y++) {
//         if (x == cx && y == cy) continue;
//         if (
//           x < 0 ||
//           x >= this.matrix.length ||
//           y < 0 ||
//           y >= this.matrix[x].length
//         )
//           continue;
//         if (this.matrix[x][y]) count++;
//       }
//     }

//     return count;
//   },

//   /**
//    * Clears the entire matrix, by setting all cells to false.
//    */
//   clear: function() {
//     for (var x = 0; x < this.matrix.length; x++) {
//       for (var y = 0; y < this.matrix[x].length; y++) {
//         this.matrix[x][y] = false;
//       }
//     }

//     this.draw();
//   },

//   /**
//    * Fills the matrix with a random pattern.
//    * The chance that a cell will be alive is at 30%.
//    */
//   randomize: function() {
//     for (var x = 0; x < this.matrix.length; x++) {
//       for (var y = 0; y < this.matrix[x].length; y++) {
//         this.matrix[x][y] = Math.random() < 0.3;
//       }
//     }

//     this.draw();
//   },

//   /**
//    * Toggels the state of one cell at the given coordinates.
//    *
//    * @param cx horizontal coordinates of the given cell
//    * @param cy vertical coordinates of the given cell
//    */
//   toggleCell: function(cx, cy) {
//     if (
//       cx >= 0 &&
//       cx < this.matrix.length &&
//       cy >= 0 &&
//       cy < this.matrix[0].length
//     ) {
//       this.matrix[cx][cy] = !this.matrix[cx][cy];
//       this.draw();
//     }
//   }
// };

// /* ***** MAIN SCRIPT ***** */

// // animation loop
// var timer;

// // Initialize game
// var game = new Game(document.getElementById("game"));

// // run or stop the animation loop
// $("#run").click(function() {
//   if (timer === undefined) {
//     timer = setInterval(run, 40);
//     $(this).text("Stop");
//   } else {
//     clearInterval(timer);
//     timer = undefined;
//     $(this).text("Start");
//   }
//   console.log(click);
// });

// // make a single step in the animation loop
// $("#step").click(function() {
//   if (timer === undefined) {
//     game.step();
//     $("#round span").text(game.round);
//   }
// });

// // clear the entire game board
// $("#clear").click(function() {
//   game.clear();
//   game.round = 0;
//   $("#round span").text(game.round);
// });

// // set a random pattern on the game board
// $("#rand").click(function() {
//   game.randomize();
//   game.round = 0;
//   $("#round span").text(game.round);
// });

// // register onclick on the canvas
// game.canvas.addEventListener("click", gameOnClick, false);

// // determens the click position and toggels the corresponding cell
// function gameOnClick(e) {
//   var x;
//   var y;

//   // determen click position
//   if (e.pageX !== undefined && e.pageY !== undefined) {
//     x = e.pageX;
//     y = e.pageY;
//   } else {
//     x =
//       e.clientX +
//       document.body.scrollLeft +
//       document.documentElement.scrollLeft;
//     y =
//       e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
//   }

//   // make it relativ to canvas
//   x -= game.canvas.offsetLeft;
//   y -= game.canvas.offsetTop;

//   // calculate clicked cell
//   x = Math.floor(x / game.cfg.cellSize);
//   y = Math.floor(y / game.cfg.cellSize);

//   game.toggleCell(x, y);
// }

// // runs the animation loop, calculates a new step and updates the counter
// function run() {
//   game.step();
//   $("#round span").text(game.round);
// }

// game.randomize();

//Formulaire

// function ValidateEmail(inputText)
// {
// let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

// if(inputText.value.match(mailformat))
// {
// document.form1.email.focus();
// return true;
// }
// else
// {
//     document.getElementById('error-email').innerHTML = " Please Enter Your Email *";
// document.form1.email.focus();
// return false;
// }

// }

function validateForm(){
	let name = document.forms["form"]["name"].value;
	let email = document.forms["form"]["email"].value;
  	let message = document.forms["form"]["message"].value;

    atpos = email.indexOf("@");
    dotpos = email.lastIndexOf(".");
    
    if (atpos < 1 || ( dotpos - atpos < 2 )) {
        document.getElementById('error-email').innerHTML = "Veuillez entrer une adresse électronique correcte *"
		this.className = "valid"
    }
  
	if (name.length<1) {
        document.getElementById('error-name').innerHTML = " Veuillez entrer votre nom *"
		this.className = "valid"
    }
    if (email.length<1) {
        document.getElementById('error-email').innerHTML = " Veuillez entrer votre adresse électronique *";
    }
    if (message.length<1) {
        document.getElementById('error-message').innerHTML = " Veuillez saisir votre message *";
    }          
    if(name.length<1 || email.length<1 || message.length<1 || (atpos < 1 || ( dotpos - atpos < 2 ))){
       	return false;
    }            
}

function checkName() {
	let name = document.forms["form"]["name"].value;
  
	if (name.length<1) {
		document.getElementById("name").className = 'valid';
		return true;
	} 
	else if (name.length>1) {
		document.getElementById("name").className = 'invalid';
		return false;
	}
}

function checkMail() {
	let email = document.forms["form"]["email"].value;
	atpos = email.indexOf("@");
    dotpos = email.lastIndexOf(".");
  
	if (atpos < 1 || ( dotpos - atpos < 2 )) {
		document.getElementById("email").className = 'valid';
		return true;
	} 
	if (email.length<1) {
		document.getElementById("email").className = 'invalid';
		return true;
	} 

	else if (email.length>1) {
		document.getElementById("email").className = 'invalid';
		return false;
	}
}
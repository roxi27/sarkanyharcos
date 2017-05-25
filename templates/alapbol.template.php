
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple Snake Game</title>
	<!-- Basic styling, centering of the canvas. -->
	<style>
	canvas {
		display: block;
		position: absolute;
		border: 1px solid #000;
		margin: auto;
		top: 0;
		bottom: 0;
		right: 0;
		left: 0;
        
	}
    body{
       background-color: #ffbb99;
    }
    .sarkany2{
        float: right;
    }
    h1{
        font-size: 20px;
        display: inline;
    }
    input{
        background: #ffeee6;
    }
	</style>
</head>



<body>
	<h1> Aktuális tekercs:</h1>
      <input type="text" id="tekercs" value="" readonly>
	  <form action="index.php?mentes" method="post">
	   <h1>Aktuális Pálya:</h1>    <input type="text" id="palya" name="palya" value="<?= $BoardSize ?>" readonly> <br>
	   <h1>Akadályok száma:</h1>    <input type="text" id="palya" name="block" value="<?= $Blocks ?>" readonly> <br>
	 <h1>Aktuális Rekord: </h1>
	 <?= $_SESSION['felhnev'] ?> : <input type="text" id="sajat" value="" name="score" readonly> <br>
  	<input type="submit" value="Mentés" name="mentes">
	  </form>
       <div><img src="sarkany.png"</div>
        <div class="sarkany2"><img src="sarkany2.png"</div>
		
</body>

<script type="text/javascript">
var //Tömbök, constansok
EMPTY = 0,
SNAKE = 1,
SMART = 2,
MIRROR = 3,
MOHOSAG = 4,
LUSTASAG = 5,
FALANKSAG = 6,
BLOCK = 7,
LEFT  = 0,
UP    = 1,
RIGHT = 2,
DOWN  = 3,
KEY_LEFT  = 37,
KEY_UP    = 38,
KEY_RIGHT = 39,
KEY_DOWN  = 40,

//változók
cols,
rows,
isMirrored=false, 
blocknumber, 
speed, 
canvas,	  
ctx,	  
keystate, 
frames,   
score,	
rols,
highscore=0,
globalid;

//Objektumok
grid = {
	width: null,  
	height: null, 
	_grid: null,  
	
    
	init: function(d, c, r) {
		this.width = c;
		this.height = r;
		this._grid = [];
		for (var x=0; x < c; x++) {
			this._grid.push([]);
			for (var y=0; y < r; y++) {
				this._grid[x].push(d);
			}
		}
	},
	
	set: function(val, x, y) {
		this._grid[x][y] = val;
	},
	
    
	get: function(x, y) {
		return this._grid[x][y];
	}
}


snake = {
	direction: null, 
	last: null,		
						
	_queue: null,	 
	
    
	init: function(d, x, y) {
		this.direction = d;
		this._queue = [];
		this.insert(x, y);
	},
	
    
	insert: function(x, y) {
		this._queue.unshift({x:x, y:y});
		this.last = this._queue[0];
	},
	
	remove: function() {
		return this._queue.pop();
	}
};


function getEmptyGrids() {
    var empty = [];
	for (var x=0; x < grid.width; x++) {
		for (var y=0; y < grid.height; y++) {
			if (grid.get(x, y) === EMPTY) {
				empty.push({x:x, y:y});
			}
		}
	}
    
    return empty;
}

//Függvények - generálás
function setBlocks() {
    var empty = getEmptyGrids();
    
    for (var i = 0; i < blocknumber; i++) {
        var randpos = empty[random(empty.length,1)];
	    grid.set(BLOCK, randpos.x, randpos.y);
    }
}


function setRols() {
	 var empty = getEmptyGrids();
    var randomItem = null;
    var randNum = Math.floor(Math.floor((Math.random() * 99) + 2));
    
    if (randNum <= 80) {
        randomItem = 2;
    } else if (randNum <= 84){
        randomItem = 3;
    } else if (randNum <= 88){
        randomItem = 4;
    } else if (randNum <= 92){
        randomItem = 5;
    } else {
        randomItem = 6; 
    }
    
    console.log(randomItem);
	var randpos = empty[random(empty.length,1)];
	grid.set(randomItem, randpos.x, randpos.y);
}

function random(u,v)
{
    return Math.round(Math.random()*(u - v));
}

function switchMirrored() {
    if (isMirrored) {
        KEY_LEFT  = 37;
        KEY_UP    = 38;
        KEY_RIGHT = 39;
        KEY_DOWN  = 40;
    } else {
        KEY_LEFT  = 39;
        KEY_UP    = 40;
        KEY_RIGHT = 37;
        KEY_DOWN  = 38;
    }
    
    isMirrored = !isMirrored;
}

//Függvények-futtatás

canvas = document.createElement('canvas');
elso();

function main() {
	ctx.font = "20px Helvetica";
	frames = 0;
	keystate = {};
	document.addEventListener("keydown", function(evt) {
		keystate[evt.keyCode] = true;
	});
	document.addEventListener("keyup", function(evt) {
		delete keystate[evt.keyCode];
	});
    blocknumber = <?= $Blocks ?>;
	init();
	loop();
   
    
}

function init() {
    
	score = 1;
    speed = 20;
    if(isMirrored) switchMirrored();
	grid.init(EMPTY, cols, rows);
	var sp = {x:0, y:Math.floor(rows/2)};
	snake.init(RIGHT, sp.x, sp.y);
	grid.set(SNAKE, sp.x, sp.y);
    setBlocks();
	setRols();
   
}

function loop() {
	update();
	draw();
	globalid=window.requestAnimationFrame(loop);
}

function update() {
	frames++;
	if (keystate[KEY_LEFT] && snake.direction !== RIGHT) {
		snake.direction = LEFT;
	}
	if (keystate[KEY_UP] && snake.direction !== DOWN) {
		snake.direction = UP;
	}
	if (keystate[KEY_RIGHT] && snake.direction !== LEFT) {
		snake.direction = RIGHT;
	}
	if (keystate[KEY_DOWN] && snake.direction !== UP) {
		snake.direction = DOWN;
	}
	if (frames%speed === 0) {
		
		var nx = snake.last.x;
		var ny = snake.last.y;
	
		switch (snake.direction) {
			case LEFT:
				nx--;
				break;
			case UP:
				ny--;
				break;
			case RIGHT:
				nx++;
				break;
			case DOWN:
				ny++;
				break;
		}
		
		if (0 > nx || nx > grid.width-1  ||
			0 > ny || ny > grid.height-1 ||
			grid.get(nx, ny) === SNAKE ||
            grid.get(nx, ny) === BLOCK
		) {
			return init();
		}
		
		if (grid.get(nx, ny) === SMART) {
            if(isMirrored) switchMirrored();
            
            speed=20;
			score+=4;
			setRols();
            for(var i=0;i<3;i++)
            {
                 snake.insert(nx, ny);
            }
         
        } else if (grid.get(nx, ny) === FALANKSAG) {
			
             if(isMirrored) switchMirrored();
            speed=20;
			score+=10;
			setRols();
            for(var i=0;i<9;i++)
            {
                 snake.insert(nx, ny);
            }
           
           
            
           
            
		} else if (grid.get(nx, ny) === MIRROR) {
            switchMirrored()
            speed=20;
            setRols();
            var tail = snake.remove();
			grid.set(EMPTY, tail.x, tail.y);
        } else if (grid.get(nx, ny) === MOHOSAG) {
              if(isMirrored) switchMirrored();
            speed/=2;
            setTimeout(function() {
                speed= 20;
            }, 5000);
            
            setRols();
            var tail = snake.remove();
			grid.set(EMPTY, tail.x, tail.y);
        } else if (grid.get(nx, ny) === LUSTASAG) {
             if(isMirrored) switchMirrored();
            speed*=1.5;
            setTimeout(function() {
                speed = 20;
            }, 5000);
            
            setRols();
            var tail = snake.remove();
			grid.set(EMPTY, tail.x, tail.y);
        } else {
			
			var tail = snake.remove();
			grid.set(EMPTY, tail.x, tail.y);
            
		}
		
        
		grid.set(SNAKE, nx, ny);
		snake.insert(nx, ny);
	}
}


function draw() {
	
	var tw = canvas.width/grid.width;
	var th = canvas.height/grid.height;
	
	for (var x=0; x < grid.width; x++) {
		for (var y=0; y < grid.height; y++) {
			
			switch (grid.get(x, y)) {
				case EMPTY:
				  ctx.fillStyle = "#ffddcc";
					break;
				case SNAKE:
					ctx.fillStyle = "#e74c3c";
					break;
				case SMART:
					ctx.fillStyle = "#f00";
                    rols="Bölcsesség";
					break;
                case MIRROR:
					ctx.fillStyle = "#8e44ad";
                    rols="Tükrök"
					break;
                case MOHOSAG:
					ctx.fillStyle = "#e74c3c";
                     rols="Mohóság"
					break;
                case LUSTASAG:
					ctx.fillStyle = "#d35400";
                    rols="Lustaság"
					break;
                case FALANKSAG:
					ctx.fillStyle = "#f1c40f";
                    rols="Falánkság"
					break;
                case BLOCK:
					ctx.fillStyle = "#000";
					break;
			}
			ctx.fillRect(x*tw, y*th, tw, th);
          
		}
	}
	
	ctx.fillStyle = "#000";
	ctx.fillText("SCORE: " + score, 10, canvas.height-10);
    document.querySelector('#tekercs').value=rols;
	if(score>highscore)
	{
		highscore=score;
		document.querySelector('#sajat').value=highscore;
	}
}

function elso()
{
    cancelAnimationFrame(globalid);
    canvas.width = <?= $BoardSizex ?>;
    cols=canvas.width/20;
	canvas.height = <?= $BoardSizey ?>;
    rows=canvas.height/20;
	ctx = canvas.getContext("2d");
	document.body.appendChild(canvas);
    main();

}
</script>

</html>
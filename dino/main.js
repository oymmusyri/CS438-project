var dino = document.querySelector('.dino')
var cactus = document.querySelector('.cactus')
var scoreBoard = document.querySelector('.score span')
var hiscoreBoard = document.querySelector('.hiscore span')
var restartBtn = document.querySelector('.restart-btn')
var storeScoreBtn = document.querySelector('.store-btn')

var jumped = false
var score = 0
var hiscore = 0;
var dinoHeight = 75,
	dinoWidth = 70
var cactusOffsetTop = cactus.offsetTop

function jump(){
	if(jumped) return
	dino.classList.add('jump')
	jumped = true
	setTimeout(function(){
		dino.classList.remove('jump')
		jumped = false
	}, 800)
}

window.addEventListener('space', function(){
	jump()
})
window.addEventListener('keyup', function(e){
	if(e.key === " "){
		jump()
	}
})


function check(){
	if(cactus.offsetLeft <= 10 + dinoWidth && cactus.offsetLeft > 10){
		if(dinoHeight + dino.offsetTop > cactus.offsetTop){
			document.querySelector('.game').classList.add('lost')
			restartBtn.style.display = "block"
			storeScoreBtn.style.display = "block"
			return
		}
	}
	score++
	if(hiscore < score){
		hiscore = score
	}
	scoreBoard.innerText = score
	hiscoreBoard.innerText = hiscore

	requestAnimationFrame(check)
}
check()





restartBtn.addEventListener('click', function(){
	document.querySelector('.game').classList.remove('lost')
	restartBtn.style.display = 'none'
	score = 0
	scoreBoard.innerText = score
	hiscoreBoard.innerText = hiscore
	check()
})

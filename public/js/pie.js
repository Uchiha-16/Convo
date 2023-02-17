let circularProgress = document.querySelector(".circular-progress"), progressValue = document.querySelector(".progress-value");

let progressStartValue = 0,
    progressEndValue = 60,
    speed = 100;

let progress = setInterval(() => {
    progressStartValue++;
    
    progressValue.textContent = `${progressStartValue}%` circularProgress.style.background = `conic-gradient(#15637C ${progressStartValue * 3.6}deg, white 0deg)`

    if(progressStartValue == progressEndValue){
        clearInterval(progress);
    }
}, speed);
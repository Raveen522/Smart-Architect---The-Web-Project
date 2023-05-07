let scrollAnimation = () => {
  var progressBar = document.getElementById("scroll_progress");
  var scrollTop = document.documentElement.scrollTop;
  var scrollHeight = document.documentElement.scrollHeight;
  var clientHeight = document.documentElement.clientHeight;
  var scrollPercentage = Math.round((scrollTop / (scrollHeight - clientHeight)) * 100);

  if(scrollPercentage>15){
    progressBar.style.visibility='visible';
    progressBar.style.opacity='1';
    progressBar.style.background = 'conic-gradient(var(--primary-color) '+scrollPercentage+'%,transparent '+scrollPercentage+'%)';
  
  }else{
    progressBar.style.visibility='hidden';
    progressBar.style.opacity='0';
  }

};

window.onscroll = scrollAnimation;


function toTop(){
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


// scroll reveal
window.addEventListener('scroll',reveal);

function reveal(){
    var reveals = document.querySelectorAll('.page-section');

    for(var i =0; i<reveals.length; i++){
        var windowHeight = window.innerHeight;
        var revealTop = reveals[i].getBoundingClientRect().top;
        var revealPoint = windowHeight*0.2;
        
        if(revealTop<windowHeight-revealPoint){
            reveals[i].classList.add('active');
        }
        else{
            reveals[i].classList.remove('active');
       }
    }
}
// ****************


// testimonial cards

const reviewCardList = document.querySelector('.review-list');
const reviewCards = reviewCardList.querySelectorAll('.review-card');
const cardDots = document.querySelectorAll('.card-dot');

let currentCardIndex = 0;

function nextCard(){
    if(currentCardIndex < 2){
        currentCardIndex += 1;
        reviewCards[currentCardIndex].style.transform = 'translateX(0px)';
        reviewCards[currentCardIndex-1].style.transform = 'translateX(-800px)';
        cardDots.forEach(cardDots => cardDots.classList.remove('active-dot'));
        cardDots[currentCardIndex].classList.add('active-dot');
    }
}
function prevCard(){
    if(currentCardIndex >0 && currentCardIndex <= 2){
        currentCardIndex -= 1;
        reviewCards[currentCardIndex].style.transform = 'translateX(0px)';
        reviewCards[currentCardIndex+1].style.transform = 'translateX(800px)';
        cardDots.forEach(cardDots => cardDots.classList.remove('active-dot'));
        cardDots[currentCardIndex].classList.add('active-dot');
    }
}

// **************



const pageSections = document.querySelectorAll('.page-section');

pageSections.forEach((section, index) => {
const observer = new MutationObserver((mutationsList) => {
    mutationsList.forEach((mutation) => {
    if (mutation.attributeName === 'class') {
        const classList = mutation.target.classList;
        if(index==0){
            if (classList.contains('active')) {
                // document.documentElement.style.setProperty('--experience-line-top',"experience-line-animation-top 1.5s 0.6s ease forwards");
                // document.documentElement.style.setProperty('--experience-line-bottom',"experience-line-animation-bottom 1.5s 0.6s ease forwards");
            
            } else {
                // document.documentElement.style.setProperty('--experience-line-top',"none");
                // document.documentElement.style.setProperty('--experience-line-bottom',"none");
            }
        }else if(index==1){
            if (classList.contains('active')) {
                document.documentElement.style.setProperty('--feature-list-line-top',"features-list-line-animation-top 1s 1s forwards");
                document.documentElement.style.setProperty('--feature-list-line-bottom',"features-list-line-animation-bottom 1s 1s forwards");
            } else {
                document.documentElement.style.setProperty('--feature-list-line-top',"none");
                document.documentElement.style.setProperty('--feature-list-line-bottom',"none");
            }
        }else if(index==2){
            if (classList.contains('active')) {
                document.documentElement.style.setProperty('--project-card-line-top',"project-card-line-animation-top 0.7s 0.5s forwards");
                document.documentElement.style.setProperty('--project-card-line-left',"project-card-line-animation-left 0.7s 0.5s forwards");
            
            } else {
                document.documentElement.style.setProperty('--project-card-line-top',"none");
                document.documentElement.style.setProperty('--project-card-line-left',"none");
            }
        }
    }
    });
});

observer.observe(section, { attributes: true });
});


function featureCounter(){
  var counter = 1; 
  var featureTimer = setInterval(function(){
    if(counter!=16){
      document.getElementById('experience-count').innerHTML = 10+counter + "+";
      document.getElementById('clients-count').innerHTML = 85+counter + "+";
      document.getElementById('awards-count').innerHTML = 5+counter + "+";
      document.getElementById('projects-count').innerHTML = 145+counter + "+";
      counter++;
      
  }else{
      clearInterval(featureTimer);
  }

  }, 100);  
}

function featureCounterReset(){
  document.getElementById('experience-count').innerHTML = 10;
  document.getElementById('clients-count').innerHTML = 85;
  document.getElementById('awards-count').innerHTML = 5;
  document.getElementById('projects-count').innerHTML = 145;
}
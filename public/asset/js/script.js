// Timeline for Work and Education
function showEducationTab() {
    document.querySelector('.work-tab').style.display = 'none';
    document.querySelector('.education-tab').style.display = 'block';
    document.querySelector('.work').classList.remove('selected');
    document.querySelector('.educ').classList.add('selected');
}

function showWorkTab() {
    document.querySelector('.work-tab').style.display = 'block';
    document.querySelector('.education-tab').style.display = 'none';
    document.querySelector('.educ').classList.remove('selected');
    document.querySelector('.work').classList.add('selected');
}

const workCards = document.querySelectorAll('.work-card');

const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('animate');
    } else {
      entry.target.classList.remove('animate');
    }
  });
}, {
  threshold: 0 // Change the threshold as needed
});

workCards.forEach(card => {
  observer.observe(card);
});
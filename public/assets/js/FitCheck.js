let selectedDifficulty = null;
const workoutOptions = document.querySelectorAll('.workout-item');
const modal = document.getElementById('modal');
const goBtn = document.getElementById('goBtn');
const difficultyBtns = document.querySelectorAll('.difficulty-btn');
const workoutTitle = document.getElementById('workout-title');

// Handle workout selection click
workoutOptions.forEach(option => {
    option.addEventListener('click', function () {
        const workout = option.querySelector('p').innerText;
        workoutTitle.innerText = `${workout}: Select Difficulty`;
        modal.style.display = 'flex';
    });
});

// Handle difficulty selection
difficultyBtns.forEach(btn => {
    btn.addEventListener('click', function () {
        difficultyBtns.forEach(b => b.classList.remove('selected'));
        btn.classList.add('selected');
        selectedDifficulty = btn.dataset.difficulty;
        goBtn.classList.remove('disabled');
    });
});

// Close modal
document.getElementById('closeBtn').addEventListener('click', function () {
    modal.style.display = 'none';
    difficultyBtns.forEach(btn => btn.classList.remove('selected'));
    goBtn.classList.add('disabled');
    selectedDifficulty = null;
});

// Handle Go button click
goBtn.addEventListener('click', function () {
    if (!goBtn.classList.contains('disabled')) {
        alert(`You selected ${workoutTitle.innerText} at ${selectedDifficulty} difficulty.`);
        modal.style.display = 'none';
        difficultyBtns.forEach(btn => btn.classList.remove('selected'));
        goBtn.classList.add('disabled');
    }
});
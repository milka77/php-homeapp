const reading = document.getElementById('reading');
const diff = document.getElementById('difference');

let currReading = parseInt(reading.value);
let difference = parseInt(diff.value);


// function updateDifference(currReading, difference) {

// }
reading.addEventListener('change', (event) => {
  let newReading = parseInt(reading.value);
  let readingDiff = newReading - currReading;
  let newDiff;

  if(newReading > currReading) {
    newDiff = difference + readingDiff;
    diff.value = newDiff;
    
  } else if(newReading < currReading) {
    newDiff = difference + readingDiff;
    diff.value = newDiff;
    diff.classList.add('is-invalid');
    document.getElementById('diff-feedback').innerHTML = 'Your new meter reading is less than it was! Please make sure you have entered the correct reading!';
  }
  
});
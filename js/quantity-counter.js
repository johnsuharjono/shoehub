const allPlus = document.querySelectorAll('.counter-plus');
const allMinus = document.querySelectorAll('.counter-minus');
const allNumber = document.querySelectorAll('.counter-number');

allPlus.forEach((plus, idx) => {
  plus.addEventListener('click', e => {
    number = allNumber[idx];
    number.innerHTML = parseInt(number.innerHTML, 10) + 1;
  });
});

allMinus.forEach((minus, idx) => {
  minus.addEventListener('click', e => {
    number = allNumber[idx];
    const currNumber = parseInt(number.innerHTML, 10);
    if (currNumber > 1) {
      number.innerHTML = parseInt(number.innerHTML, 10) - 1;
    }
  });
});

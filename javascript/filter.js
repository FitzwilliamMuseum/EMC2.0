
//This Script is what makes the filters in search filter! It uses html data attributes \\


// Get your select dropdown by id (eg: $('#filtlist');)
var select = document.getElementById('filtlist');


// Apply an event listener with callback to select element
// (eg: select.on('change', callbackfunction());)
select.addEventListener('change', e => {
  // get all matching elements to classname ( $('.imghalf'); )
  var elements = document.getElementsByClassName('imghalf');

  // if selected option is '' make everything visible and return
  if (e.target.value === '') {
    Array.prototype.forEach.call(elements, val => { val.classList.remove('hidden') });
    return;
  }
  // grab and format selected option to a number
  var option = Number(e.target.value);

  //  Foreach is exactly what you would expect for each value in collection, do this function (maybe - $.each(elements, function); )
  Array.prototype.forEach.call(elements, val => { val.classList.add('hidden'); });
  // filter by matching data option to select option, returns HTMLCollection
  let visible = Array.prototype.filter.call(elements, val => Number(val.dataset.emcscbi) === option);
  // Make matching elements visible
  Array.prototype.forEach.call(visible, val => { val.classList.remove('hidden') })
});
// Get your select dropdown by id (eg: $('#filtlist');)
var select = document.getElementById('filtlist2');


// Apply an event listener with callback to select element
// (eg: select.on('change', callbackfunction());)
select.addEventListener('change', e => {
  // get all matching elements to classname ( $('.imghalf'); )
  var elements = document.getElementsByClassName('imghalf');

  // if selected option is '' make everything visible and return
  if (e.target.value === '') {
    Array.prototype.forEach.call(elements, val => { val.classList.remove('hidden') });
    return;
  }
  // grab and format selected option to a string
  var option = String(e.target.value);

  //  Foreach is exactly what you would expect for each value in collection, do this function (maybe - $.each(elements, function); )
  Array.prototype.forEach.call(elements, val => { val.classList.add('hidden'); });
  // filter by matching data option to select option, returns HTMLCollection
  let visible = Array.prototype.filter.call(elements, val => String(val.dataset.period) === option);
  // Make matching elements visible
  Array.prototype.forEach.call(visible, val => { val.classList.remove('hidden') })
});

// Get your select dropdown by id (eg: $('#filtlist');)
var select = document.getElementById('filtlist3');


// Apply an event listener with callback to select element
// (eg: select.on('change', callbackfunction());)
select.addEventListener('change', e => {
  // get all matching elements to classname ( $('.imghalf'); )
  var elements = document.getElementsByClassName('imghalf');

  // if selected option is '' make everything visible and return
  if (e.target.value === '') {
    Array.prototype.forEach.call(elements, val => { val.classList.remove('hidden') });
    return;
  }
  // grab and format selected option to a string
  var option = String(e.target.value);

  //  Foreach is exactly what you would expect for each value in collection, do this function (maybe - $.each(elements, function); )
  Array.prototype.forEach.call(elements, val => { val.classList.add('hidden'); });
  // filter by matching data option to select option, returns HTMLCollection
  let visible = Array.prototype.filter.call(elements, val => String(val.dataset.metal) === option);
  // Make matching elements visible
  Array.prototype.forEach.call(visible, val => { val.classList.remove('hidden') })
});



// Get your select dropdown by id (eg: $('#filtlist');)
var select = document.getElementById('filtlist4');

// Apply an event listener with callback to select element
// (eg: select.on('change', callbackfunction());)
select.addEventListener('change', e => {
  // get all matching elements to classname ( $('.imghalf'); )
  var elements = document.getElementsByClassName('imghalf');

  // if selected option is '' make everything visible and return
  if (e.target.value === '') {
    Array.prototype.forEach.call(elements, val => { val.classList.remove('hidden') });
    return;
  }
  // grab and format selected option to a string
  var option = String(e.target.value);

console.log(option);
  //  Foreach is exactly what you would expect for each value in collection, do this function (maybe - $.each(elements, function); )
  Array.prototype.forEach.call(elements, val => { val.classList.add('hidden'); });
  // filter by matching data option to select option, returns HTMLCollection
  let visible = Array.prototype.filter.call(elements, val => String(val.dataset.ruler) === option);
  // Make matching elements visible
  Array.prototype.forEach.call(visible, val => { val.classList.remove('hidden') })
});


// Get your select dropdown by id (eg: $('#filtlist');)
var select = document.getElementById('filtlist5');

// Apply an event listener with callback to select element
// (eg: select.on('change', callbackfunction());)
select.addEventListener('change', e => {
  // get all matching elements to classname ( $('.imghalf'); )
  var elements = document.getElementsByClassName('imghalf');

  // if selected option is '' make everything visible and return
  if (e.target.value === '') {
    Array.prototype.forEach.call(elements, val => { val.classList.remove('hidden') });
    return;
  }
  // grab and format selected option to a string
  var option = String(e.target.value);

console.log(option);
  //  Foreach is exactly what you would expect for each value in collection, do this function (maybe - $.each(elements, function); )
  Array.prototype.forEach.call(elements, val => { val.classList.add('hidden'); });
  // filter by matching data option to select option, returns HTMLCollection
  let visible = Array.prototype.filter.call(elements, val => String(val.dataset.mint) === option);
  // Make matching elements visible
  Array.prototype.forEach.call(visible, val => { val.classList.remove('hidden') })
});

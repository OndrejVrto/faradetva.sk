function setupDatepicker(fromSelector, toSelector) {
  $('#timezone').val(moment.tz.guess()); //Date and time pickers

  var options = {
    icons: {
      time: 'far fa-clock'
    },
    locale: 'sk',
    useCurrent: false,
    buttons: {
      showToday: true,
      showClear: true // showClose: true

    },
    tooltips: {
      today: 'Choď na dnešný dátum',
      clear: 'Vymazať výber',
      close: 'Zavrieť',
      selectTime: 'Vyber čas',
      selectDate: 'Vyber dátum',
      selectMonth: 'Vyber mesiac',
      prevMonth: 'Predchádzajúci mesiac',
      nextMonth: 'Nasledovný mesiac',
      selectYear: 'Vyber rok',
      prevYear: 'Predchádzajúci rok',
      nextYear: 'Nasledovný rok',
      selectDecade: 'Vyber dekádu',
      prevDecade: 'Predchádzajúca dekáda',
      nextDecade: 'Nasledovná dekáda',
      prevCentury: 'Predchádzajúce storočie',
      nextCentury: 'Nasledujúce storočie',
      incrementHour: 'Pridať hodinu',
      pickHour: 'Vybrať hodinu',
      decrementHour: 'Odobrať hodinu',
      incrementMinute: 'Pridať minútu',
      pickMinute: 'Vybrať minútu',
      decrementMinute: 'Odobrať minútu',
      incrementSecond: 'Pridať sekundu',
      pickSecond: 'Vybrať sekundu',
      decrementSecond: 'Odobrať sekundu'
    }
  };
  $(fromSelector).datetimepicker(options);
  $(toSelector).datetimepicker(options);
  $(fromSelector).on("change.datetimepicker", function (e) {
    $(toSelector).datetimepicker('minDate', e.date);
  });
  $(toSelector).on("change.datetimepicker", function (e) {
    $(fromSelector).datetimepicker('maxDate', e.date);
  });
}

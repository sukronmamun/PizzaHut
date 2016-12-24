Chartist.Line('.ct-chart', {
  labels: ['Sen', 'Sel', 'Rab', 'Kamis', 'Jum','Sab','Ming'],
  series: [[22,21, 21, 0, 1,1,1]]
},{
  showPoint: true
}, [['screen and (min-width: 640px)']],
{ showPoint: true,
  pointColor:'#ffffff',
  low: 0,
  showArea: true,
  fullWidth: true,
  chartPadding: {
    right: 40,
  }
});

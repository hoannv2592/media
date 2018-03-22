//Line chart with area
new Chartist.Line('#chart-with-area', {
  labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
  series: [
    [5, 9, 7, 8, 5, 3, 5, 4,4,5,6]
  ]
}, {
  low: 0,
  showArea: true,
  plugins: [
    Chartist.plugins.tooltip()
  ]
});



















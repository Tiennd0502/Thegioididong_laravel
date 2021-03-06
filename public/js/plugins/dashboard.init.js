! function(o) {
  "use strict";

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // $.ajax({
  //   url: url,
  //   type: "",
  //   dataType: 'json',
  //   async: false,
  //   data: {
  //     status: value
  //   },
  //   success: function(data) {
  //     console.log('thanh cong');
  //   },
  //   error: function(error) {
  //     console.log('loi cmnr');
  //   }
  // });

  function a() {}
  a.prototype.init = function() {
    o(".peity-line").each(function() { o(this).peity("line", o(this).data()) }), o(".knob").knob(), c3.generate({
      bindto: "#combine-chart",
      data: {
        columns: [
          ["SonyVaio", 30, 20, 50, 40, 60, 50, 60],
          ["iMacs", 200, 130, 90, 240, 130, 220, 200],
          ["Tablets", 300, 200, 160, 400, 250, 250, 270],
          ["iPhones", 200, 130, 90, 240, 130, 220, 235],
          ["Macbooks", 130, 120, 150, 140, 160, 150, 145]
        ],
        types: { SonyVaio: "bar", iMacs: "bar", Tablets: "spline", iPhones: "line", Macbooks: "bar" },
        colors: { SonyVaio: "#5468da", iMacs: "#4ac18e", Tablets: "#ffbb44", iPhones: "#ea553d", Macbooks: "#6d60b0" },
        groups: [
          ["SonyVaio", "iMacs"]
        ]
      },
      axis: { x: { type: "categorized" } }
    }), c3.generate({
      bindto: "#donut-chart",
      data: {
        columns: [
          ["Desktops", 50],
          ["Mobiles", 25],
          ["Tablets", 25]
        ],
        type: "donut"
      },
      donut: { title: "Sales Analytics", width: 30, label: { show: !1 } },
      color: { pattern: ["#5468da", "#4ac18e", "#6d60b0"] }
    })
  }, o.Dashboard = new a, o.Dashboard.Constructor = a
}(window.jQuery),
function() {
  "use strict";
  window.jQuery.Dashboard.init()
}();
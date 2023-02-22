var date_js = new Date();
var current_month = date_js.getMonth() + 1;
var day_today = date_js.getDate();
var last0 = day_today+`/`+current_month;

var one_day_ago = date_js - 86400000;
var last_day1 = new Date(one_day_ago).getDate();
var last_month1 = new Date(one_day_ago).getMonth() + 1;
var last1 = last_day1+`/`+last_month1;

var two_day_ago = date_js - 86400000 * 2;
var last_day2 = new Date(two_day_ago).getDate();
var last_month2 = new Date(two_day_ago).getMonth() + 1;
var last2 = last_day2+`/`+last_month2;

var three_day_ago = date_js - 86400000 * 3;
var last_day3 = new Date(three_day_ago).getDate();
var last_month3 = new Date(three_day_ago).getMonth() + 1;
var last3 = last_day3+`/`+last_month3;

var four_day_ago = date_js - 86400000 * 4;
var last_day4 = new Date(four_day_ago).getDate();
var last_month4 = new Date(four_day_ago).getMonth() + 1;
var last4 = last_day4+`/`+last_month4;

var five_day_ago = date_js - 86400000 * 5;
var last_day5 = new Date(five_day_ago).getDate();
var last_month5 = new Date(five_day_ago).getMonth() + 1;
var last5 = last_day5+`/`+last_month5;

var six_day_ago = date_js - 86400000 * 6;
var last_day6 = new Date(six_day_ago).getDate();
var last_month6 = new Date(six_day_ago).getMonth() + 1;
var last6 = last_day6+`/`+last_month6;

// ---------------------------- Lọc thời gian (Tương tác)
var day_val1 = $("input[name=day_one]").val();
var day_val2 = $("input[name=day_two]").val();

var day_onef = new Date(day_val1).getTime();
var day_twof = new Date(day_val2).getTime();

var pick_day1 = new Date(day_val1).getDate();
var pick_month1 = new Date(day_val1).getMonth() + 1;
var pick_day2 = new Date(day_val2).getDate();
var pick_month2 = new Date(day_val2).getMonth() + 1;

var arr_day = [];
for (var i = day_onef; i <= day_twof; i=i+86400000) {
    var day_i = new Date(i).getDate()+'/'+(new Date(i).getMonth() + 1);
    arr_day.push(day_i);
}

if(day_val1 != "" && day_val2 != ""){
    var push_array_day = arr_day;
}else{
    var push_array_day = [last6,last5,last4,last3,last2,last1,last0];
}

// --------------------------------- Tương tác Bài viết
const labels = push_array_day;
const data = {
    labels: labels,
    datasets: [{
      label: 'Bài viết',
      backgroundColor: '#FFA800',
      borderColor: '#FFA800',
      data: arr_update,
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {}
};
const myChart = new Chart(
    document.getElementById('myChart'),
    config
);
// --------------------------------- Bình luận
const data2 = {
    labels: labels,
    datasets: [{
      label: 'Bình luận',
      backgroundColor: '#FFA800',
      borderColor: '#FFA800',
      data: arr_comment,
    }]
};

const config2 = {
    type: 'line',
    data: data2,
    options: {}
};
const myChart2 = new Chart(
    document.getElementById('myChart2'),
    config2
);

// --------------------------------- Cảm xúc
const data3 = {
    labels: labels,
    datasets: [{
      label: 'Cảm xúc',
      backgroundColor: '#FFA800',
      borderColor: '#FFA800',
      data: arr_like,
    }]
};

const config3 = {
    type: 'line',
    data: data3,
    options: {}
};
const myChart3 = new Chart(
    document.getElementById('myChart3'),
    config3
);

// --------------------------------- Thành viên
const data4 = {
    labels: labels,
    datasets: [{
      label: 'Thành viên',
      backgroundColor: '#FFA800',
      borderColor: '#FFA800',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
};

const config4 = {
    type: 'line',
    data: data4,
    options: {}
};
const myChart4 = new Chart(
    document.getElementById('myChart4'),
    config4
);


function click_tuongtac(a,b,c,d){
    $(a).hide();
    $(b).show();
    $(c).removeClass("back_color_tt");
    $(d).addClass("back_color_tt");
}


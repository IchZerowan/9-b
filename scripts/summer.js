var divsum = document.getElementById('sum');

function printsum() {
    var date = new Date();
    var sum = new Date(2016, 6, 1);
    var time = sum - date;
    divsum.innerHTML = "<p>До лета осталось:" + time.toLocaleString() + "</p>";
}

printsum();
setInterval(printsum, 1000);
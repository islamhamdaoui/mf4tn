document.getElementById("get_info").addEventListener("click", function () {
  var id = document.getElementById('id').value;
  call_api(id);
});

function call_api(id) {
  var request = new XMLHttpRequest();
  request.open("GET", "api.php?id=" + id, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
        var info = JSON.parse(request.responseText)
        if(info['success']){
            document.getElementById('info').innerHTML += `<br>
            ID: ${info['info']['id']}<br>
            Username: ${info['info']['username']}<br>
            Email: ${info['info']['email']}<br>
            Fullname: ${info['info']['fullname']}<br><br>
            `;
            }
        else{
            document.getElementById('info').innerHTML += `<br>User ${id} not found<br><br>`
        }}
        
  };
}

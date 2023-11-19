<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>

<body>
    <div class="container py-4">
        <h2 align='center'>Facebook Friends Search</h2>
        <div class="py-4" align="center">
            <form action="profile.php">
                <input type="text" name="search" id="search" placeholder="Search on facebook" class="form-control">
            </form>
        </div>
        <ul class="list-group" id="result"></ul>
    </div>



    <script>
        $(function(){
            $('#search').keyup(function(){ //event หลังจากพิม 
                $('#result').html('');
                let txt = $('#search').val(); //ดึงค่าที่พิมเก็บในตัวแปร
                let regex = new RegExp(txt,"i"); //i : case sensitive
                // console.log(regex);
                $.getJSON("Friends.json",function(data){ //ดึง json มาใช้
                    $.each(data,function(key,value){ //เรียกหา Json แต่ละตัว
                        if(value.name.search(regex) != -1 || value.location.search(regex) != -1){ //The search() method returns -1 if no match is found.
                            $('#result').append('<li class="list-group-item"><img src="'+value.image+'" width="50" height="50" class="img-thumbnail">'+'  '+value.name+' | League : '+value.location+'</li>');
                        } 
                    });
                });
            });

            //เมื่อคลิกที่แต่ละคน จะทำการเลือก
            $('#result').on('click','li',function(){
                let txt0 = $(this).text().split('|');
                $('#search').val(txt0[0].trim());
                $('#result').html('');
            })
        });
    </script>
</body>

</html>
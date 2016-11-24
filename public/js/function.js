/**
 * Created by kanak on 14/10/16.
 */
$('#tweets').click(function ()
    {
       $.get('/getTweets', function(data)
       {
           var parsed = JSON.parse(data);
           var html = '<table style="width:100%" class="table table-responsive text-center"><tr><th class="text-center"> created_at  </th><th class="text-center"> id </th> <th class="text-center"> id_str </th><th class="text-center"> text </th><th class="text-center"> truncated </th></tr>';

           $(parsed).each(function (key,value) {
            html += '<tr><td>' + value.created_at + '</td><td>' + value.id + '</td><td>' + value.id_str + '</td><td>' + value.text + '</td><td>' + value.truncated + '</td></tr>';
            });
           html += '</table>';
           $('#tab').html(html);
       });
    }
);
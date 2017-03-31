(function() {
    $(".quiz").on('change', function(){
        var selected = $(this).val();
        $.ajax({
            url: base+'/load/questions/'+selected,
            success: function(response){
                var questionhtml = "";
                $.each(response, function(i, key){
                    questionhtml+='<div id="list">';
                        questionhtml += '<h2>Question '+(i+1)+':</h2>';
                        questionhtml += '<h3>'+key.title+'</h3>';
                        questionhtml += '<ul>';
                        $.each(key.options, function(index,k){
                            questionhtml += '<li><input type="radio" name="answer'+i+'" class="choosed" value="'+k+'"><span>'+k+'</span></li>';
                        });
                        questionhtml += '</ul>';
                        questionhtml += '<input type="hidden" class="player_answer" value="">';
                        questionhtml += '<input type="hidden" class="correct_answer" value="'+key.answer+'">';
                    questionhtml += '</div>';
                });
                questionhtml += "<div><button class='calculate'>Find Your Score</button></div>";
                $("#questions").html(questionhtml);
            }
        });
    });
    $('div#questions').on('click','.choosed', function(){
        var choosed = $(this).val();
        $(this).parent().parent().next('.player_answer').val(choosed);
    });

    function diff(A, B) {
        return A.filter(function (a) {
            return B.indexOf(a) == -1;
        });
    }
    $('body').on('click','.calculate', function(){
        var choosed = $(this).val();
        var players = []; 
        var correct = [];
        $(".player_answer").each(function(){
            if($(this).val() != ""){
                // console.log('arif'+$(this).val());
                players.push($(this).val());
            }
        });
        $(".correct_answer").each(function(){
            correct.push($(this).val());
        });
        if(players.length == correct.length){
            total = correct.length;
            var result = diff(players, correct);
            $('.list').hide();
            var html = "<div>Your result is "+(total - result.length) +" out of " +total+"</div>";
            // alert("Your result is "+(total - result.length) +" out of " +total);
            $('div#questions').html(html);

        }else{
            alert("Please attempts all questions");
        }

    });

})();
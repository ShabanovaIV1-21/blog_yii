$(
    () => {
        $('#catalogue'). on('click', '.btn-react', function(e) {
            e.preventDefault();
            const a = $(this);
            // console.log(a)
            // // 
            console.log(a.parent().find('.dislike'));
           

            $.ajax({
                url: a.attr('href'),
                type: "POST",
                data:{id: a.data('id'), react: a.data('react')},
    
                success (data) {
                    if (data.react == 1) {
                        a.find('.like').html('👍');
                        a.find('.count-action-like').html(data.count.likes);
                        a.parent().find('.count-action-dislike').html(data.count.dislikes);
                        a.parent().find('.dislike').html('👎🏻');

                    } else if (data.react ===0) {
                        a.find('.dislike').html('👎');
                        a.find('.count-action-dislike').html(data.count.dislikes);
                        a.parent().find('.count-action-like').html(data.count.likes);
                        a.parent().find('.like').html('👍🏻');
                    } else {
                        a.parent().find('.like').html('👍🏻');
                        a.parent().find('.dislike').html('👎🏻');
                        a.parent().find('.count-action-dislike').html(data.count.dislikes);
                        a.parent().find('.count-action-like').html(data.count.likes);
                        
                    }
                    
                    
                }
            })
            
            //console.log($(this).data('id'))
    
        })
    }
)
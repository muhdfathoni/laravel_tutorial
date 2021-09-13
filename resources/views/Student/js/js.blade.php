<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','.faculty_ajax',function(){
            // console.log("hmm its change");

            var course_id=$(this).val();
            // console.log(cat_id);
            var div=$(this).parent().parent();

            var op=" ";

            $.ajax({
                type:'get',
                url:'{!!URL::to('getcourse')!!}',
                data:{'id':course_id},
                success:function(data){
                    //console.log('success');

                    //console.log(data);

                    //console.log(data.length);
                    op+='<option selected disabled>--Choose Course--</option>';
                    for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }

                div.find('.course_ajax').html(" ");
                div.find('.course_ajax').append(op);
                },
                error:function(){

                }
            });
        });

    });
</script>
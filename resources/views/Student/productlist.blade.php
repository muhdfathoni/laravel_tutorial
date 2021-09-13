@extends('layouts.app')

@section('content')

<span>Product Category: </span>
  <select style="width: 200px" class="productcategory" id="prod_cat_id">
  	
  	<option value="0" disabled="true" selected="true">-Select-</option>
  	@foreach($prod as $cat)
  		<option value="{{$cat->id}}">{{$cat->name}}</option>
  	@endforeach

  </select>

  <span>Product Name: </span>
  <select style="width: 200px" class="productname">

  	<option value="0" disabled="true" selected="true">Product Name</option>
  </select>

  <span>Product Price: </span>
  <input type="text" class="prod_price">

@endsection

@section('script')

    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('change','.productcategory',function(){
                // console.log("hmm its change");

                var cat_id=$(this).val();
                // console.log(cat_id);
                var div=$(this).parent();

                var op=" ";

                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findProductName')!!}',
                    data:{'id':cat_id},
                    success:function(data){
                        //console.log('success');

                        //console.log(data);

                        //console.log(data.length);
                        op+='<option value="0" selected disabled>chose product</option>';
                        for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }

                    div.find('.productname').html(" ");
                    div.find('.productname').append(op);
                    },
                    error:function(){

                    }
                });
            });

        });
    </script>

@endsection
@extends('layouts/app')
    @section('content')
       <h1>Posts</h1>
       Category<select id ='category'>
                <option selected="selected" value = "">Select Category</option>
                @foreach($categories as $category)
                        <option>{{$category->category}}</option>
                @endforeach
        </select>
        Company<select id ='company'>
                <option selected="selected" value = "">Select Company</option>
                @foreach($companies as $company)
                    <option>{{$company->company}}</option>
                 @endforeach
             </select>
  <div  id="show_data">

</div>




<script type="text/javascript">

$(document).ready(function(){

    get_data();
   
    $('#category').on('click',function(){
        get_data();
    });

    $('#company').on('click',function(){
        get_data();
    })
        function get_data(){
            // var action = 'fetch_data';
            var action = '';
            var category = $('#category').val();
            var company = $('#company').val();
            $.ajaxSetup({
                        headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
                        });
            $.ajax({
                url:"ajax",
                method:"POST",
                data:{company:company,category:category},
                success:function(data){
                    $('#show_data').html(data);
                }
            });
        }
});
</script>


    @endsection

    
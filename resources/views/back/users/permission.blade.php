@extends('back.layouts.iframe')


@section("content")
<div class="row">

	<div class="col-md-8">
    	<form method="post" enctype="multipart/form-data" action="{{ asset('admin/users/permission/'.$id)}} " 
        class="form-horizontal">
			{{csrf_field()}}
            <?php
            $links = \DB::table("links")->where("parent_id",0)->get();            
            ?>
            <ul class="permissions list-unstyled">
                @foreach($links as $l)
                <?php
                $sublinks = \DB::table("links")->where("parent_id",$l->id)->get();
                
                $hasPermission=\DB::table("admin_link")->where("link_id",$l->id)
                    ->where("user_id",$id)->count();
                ?>
                <li>
                    <label>
                        <input {{$hasPermission?"checked":""}} type="checkbox" name="permissions[]" value="{{$l->id}}" >
                        <b>{{$l->title}}</b>
                    </label>
                    <ul class="list-unstyled">
                         @foreach($sublinks as $sl)
                        <?php
                        $hasSubPermission=\DB::table("admin_link")->where("link_id",$sl->id)
                    ->where("user_id",$id)->count();
                        ?>
                        <li>
                            <label style="padding-right:20px; margin-bottom:10px;">
                                
                             <input {{$hasSubPermission?"checked":""}}  type="checkbox" name="permissions[]" 
                             value="{{$sl->id}}" >
                             {{$sl->title}}
                            </label>
                        </li>
                         @endforeach()
                    </ul>
                </li>
                @endforeach()
            </ul>
              <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
    </div>
</div>

@endsection()




@section("js")
<script>
    $(function(){
        $(".permissions :checkbox").click(function(){
            var checked=$(this).prop("checked");
            $(this).parent().next().find(":checkbox").prop("checked",checked);
            
            $(this).parents("ul").each(function(){
                checked=$(this).find(":checked").size()>0;
                $(this).prev().find(":checkbox").prop("checked",checked);
            });
        });
    });
</script> 
@endsection()



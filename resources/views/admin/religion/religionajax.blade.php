<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 5%">S. No</th>
            <th style="width: 10%">Religion</th>
            <th style="width: 8%">Actions</th>
        </tr>
    </thead>
    <tbody>
      <?php if(count($users) != 0){

        ?>
          @foreach($users as $u)
        <tr class="data">
            <td>{{ ++$srNo }}</td>
            <td>{{ $u->name }}</td>


            <td >
              @if(count($u->religiondetail) == 0)
             <a href="{{url($prefix.'/religions-edit/'.Crypt::encrypt($u->id))}}"><i class="fa fa-edit"></i></a>
             <a class="deleterecord" data-link="{{url($prefix.'/religions-delete')}}" data-id="{{ $u->id }}"><i class="fa fa-trash deleterecord"  data-link="{{url($prefix.'/religions-delete')}}"  data-id="{{ $u->id }}" aria-hidden="true"></i></a>
             @endif
             </td>
             </td>
        </tr>
        @endforeach
            <?php
          }
          else {?>
            <tr><td colspan="3"><center>No Record Found</center></td></tr>
          <?php }?>

    </tbody>
</table>
<div class="pagination1">
    {{$users->links()}}
</div>

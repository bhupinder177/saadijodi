<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 5%">S. No</th>
            <th style="width: 10%">First Name</th>
            <th style="width: 10%">Last Name</th>
            <th style="width: 10%">Email</th>
            <th style="width: 12%">Status</th>
            <th style="width: 5%">Action</th>
        </tr>
    </thead>
    <tbody>
      <?php if(count($users) != 0){

        ?>
          @foreach($users as $u)
        <tr class="data">
            <td>{{ ++$srNo }}</td>
            <td>{{ $u->firstName }}</td>
            <td>{{ $u->lastName }}</td>
            <td>{{ $u->email }} </td>


            <td>
              <div class="form-group">
              <select data-id="{{ $u->id }}" class="form-control ownerStatuschange">
                <option value="">Select Status</option>
                <option data-id="{{ $u->id }}" @if($u->status == 1) selected @endif   value="1">Active</option>
                <option data-id="{{ $u->id }}" @if($u->status == 0) selected @endif  value="0">InActive</option>
              </select>
            </div>
            </td>
            <td>
              <a class="sendCoupon" data-name="{{ $u->firstName }}" data-id="{{ $u->id }}"><i  data-id="{{ $u->id }}" class="sendCoupon fa fa-gift"></i> </a>
            </td>


        </tr>
        @endforeach
            <?php
          }
          else {?>
            <tr><td colspan="8"><center>No Record Found</center></td></tr>
          <?php }?>

    </tbody>
</table>
<div class="pagination1">
    {{$users->links()}}
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 5%">S. No</th>
            <th style="width: 10%">User Name</th>
            <th style="width: 5%">Amount($)</th>
            <th style="width: 5%">Coupon Amount</th>
            <th style="width: 10%">Date</th>
        </tr>
    </thead>
    <tbody>
      <?php if(count($users) != 0){

        ?>
          @foreach($users as $u)
        <tr class="data">
            <td>{{ ++$srNo }}</td>
            <td>{{ $u->user->firstName.' '.$u->user->lastName }}</td>
            <td>{{ $u->amount }}</td>
            <td>{{ $u->coupon }}</td>
            <td>{{ date('d-m-Y',strtotime($u->created_at)) }}</td>

        </tr>
        @endforeach
            <?php
          }
          else {?>
            <tr><td colspan="4"><center>No Record Found</center></td></tr>
          <?php }?>

    </tbody>
</table>
<div class="pagination1">
    {{$users->links()}}
</div>

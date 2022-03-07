<form action="" method="POST">
       @csrf
       <input type="text" name="name" placeholder="nhập tên">
       <input type="text" name="email" placeholder="nhập email">
       <input type="password" name="password" placeholder="nhập password">
       <input type="password" name="comfirmPassword" placeholder="nhập password">
       <select name="role_id" id="">
              @foreach ($roles as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
              @endforeach
       </select>
       @if (Session::has('msg'))
           <p>{{Session::get('msg')}}</p>
       @endif
       <button>register</button>
</form>
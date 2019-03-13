@include('boostrapinc')
<script>
        return confirm("Are you sure?");
</script>
<div class="container bg-light">
    <div class="form-group">
        <form action="{{url('Service')}}" method="POST" class = "form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            <div>
                <h2 align="center">Добаление новой услуги</h2>
                <label>Название услуги</label>
                <input type="text" name="name" id="service-name" class="form-control" required>
                <label>Стоимость услуги</label>
                <input type="number" name="cost" id="service-cost" class="form-control" required> 
            </div>
            <div>
                <label>Выберите фотографию для услуги</label>
                <input class="btn btn-secondary btn-sm col-lg-12 col-md-8 col-sm-6 m-3" type="file" name="image">
            </div>
            <div class="form-group">
                <button type="sumbit" class="btn btn-success"><i class="fa fa-plus"></i> Добавить усллугу</button>
            </div>
        </form>
    </div>
    <div class="panel panel-default">
        <table class="table table-striped task table">
            <thead>
                <th>Топ Услуги</th>
                <th>Цена</th>
            </thead>
            <tbody>
            @foreach($services as $serv)
            @if($serv->isMain==1)
            <tr>
                <td class="table-text">
                    <div>{{ $serv->name }}</div>
                </td>
                 <td class="table-text">
                    <div>{{ $serv->cost }}</div>
                </td>
                    <td>
                 <form action="{{url('lowerrank/'.$serv->id)}}" method="POST">
                    {{csrf_field()}}
                        <button type = "sumbit"  class="btn btn-outline-primary" >Убрать из топа</button>
                </form>
                    </td>
                <form action="{{url('service/'.$serv->id)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <td>
                        <button type = "sumbit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete service?')">Удалить</button>
                    </td>
                </form>
            </tr>
            @endif
            @endforeach    
            </tbody>
        </table>
    </div>
      <div class="panel panel-default">
        <table class="table table-striped task table">
            <thead>
                <th>Услуги</th>
                <th>Цена</th>
            </thead>
            <tbody>
            @foreach($services as $serv)
            @if($serv->isMain==0)
            <tr>
                <td class="table-text">
                    <div>{{ $serv->name }}</div>
                </td>
                 <td class="table-text">
                    <div>{{ $serv->cost }}</div>
                </td>
                 <form class ="delete" action="{{url('uprank/'.$serv->id)}}" method="POST">
                    {{csrf_field()}}
                    <td>
                        <button type = "sumbit"  class="btn btn-outline-primary" >В топ</button>
                    </td>
                </form>
                <form action="{{url('service/'.$serv->id)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <td>
                        <button type = "sumbit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete service?')">Удалить</button>
                    </td>
                </form>
            </tr>
            @endif
            @endforeach    
            </tbody>
        </table>
    </div>
     <div class="form-group">
        <form action="{{url('Place')}}" method="POST" class = "form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            <div>
                <h2 align="center">Добаление нового отделения</h2>
                <label>Город</label>
                <input type="text" name="city" id="city-name" class="form-control" required>
                <label>Адрес</label>
                <input type="text" name="address" id="address-name" class="form-control" required>
                <label>Номер телефона</label>
                <input type="text" name="phone" id="phone-number" class="form-control"maxlength="12" required >  
            </div>
            <div class="form-group mt-3">
                <button type="sumbit" class="btn btn-success"><i class="fa fa-plus"></i>Добавить усллугу</button>
            </div>
        </form>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
        </div>
        <div class="panel panel-default">
            <table class="table table-striped task table">
                <thead>
                    <th>Услуги</th>
                    <th>Цена</th>
                </thead>
                <tbody>
                @foreach($places as $place)
                <tr>
                    <td class="table-text">
                        <div>{{ $place->city }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $place->address }}</div>
                    </td>
                    <form action="{{url('place/'.$place->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <td>
                            <button type = "sumbit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete service?')">Удалить</button>
                        </td>
                    </form>
                </tr>
                @endforeach    
                </tbody>
            </table>
        </div>
        <form action="{{url('/main/logout')}}" method="get">
           <button type = "sumbit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to exit?')">Выход</button>
        </form>
    </div>
</div>



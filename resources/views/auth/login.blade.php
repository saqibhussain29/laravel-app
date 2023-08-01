@extends('layout.app')
@section('content')


<div class="container">

    <div class="row">

        <div  class="col-md-4 offset-md-4">

            <div class="card form-holder">


                <div class="card-body">
                  <h1>login </h1>


                  @if (Session::has('error'))
                  <p class="text-danger">{{session::get('error')}}</p>
                      
                  @endif
                  @if (Session::has('success'))
                  <p class="text-success">{{session::get('success')}}</p>
                      
                  @endif
                  <form   action="{{route('login')}}" method="POST"  >
                    @csrf
                           @method('post')
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                      @if ($errors->has('email'))
                      <p class="text-danger">{{$errors->first('email')}}</p>
                          
                      @endif
                      </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control"  name="password" >
                      @if ($errors->has('password'))
                      <p class="text-danger">{{$errors->first('password')}}</p>
                          
                      @endif
                    </div>

                    <div class="row" >
                        <div class="col-8  text-left" >
                            <a href=""  class="btn btn-link" >Forget password</a>
                            </div>
                    <div class="col-4  text-right my-2" >
                   <input  type="submit" class="btn btn-primary" value="login">
                    </div>
                </div>
            
                  </form>


                </div>

            </div>

        </div>

    </div>
</div>
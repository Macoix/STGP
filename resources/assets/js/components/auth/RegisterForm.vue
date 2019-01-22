<template>
 <form method="post" @submit.prevent="submit" @keydown="clearErrors($event.target.name)">
  <div class="alert alert-success text-center" v-show="form.succeeded" id="result"> Registro Exitoso! <i class="fa fa-refresh fa-spin"></i> Entrando!</div>
  <div class="form-group has-feedback " :class="{ 'has-error': form.errors.has('documento') }">
    <select class="form-control" name="documento" v-model="form.documento">
      <option value="">Seleccione</option>
      <option value="Cedula">Cedula</option>
      <option value="Pasaporte">Pasaporte</option>
    </select>
   <transition name="fade">
    <span class="help-block" v-if="form.errors.has('documento')" v-text="form.errors.get('documento')"></span>
   </transition>
  </div>
  <div class="form-group has-feedback " :class="{ 'has-error': form.errors.has('numero') }">
   <input type="text" class="form-control" placeholder="Ingrese Numero Identificacion" name="numero" value="" v-model="form.numero"/>
   <span class="fa fa-id-card-o form-control-feedback"></span>
   <transition name="fade">
    <span class="help-block" v-if="form.errors.has('numero')" v-text="form.errors.get('numero')"></span>
   </transition>
  </div>
  <div class="form-group has-feedback " :class="{ 'has-error': form.errors.has('name') }">
   <input type="text" class="form-control" placeholder="Nombres" name="name" value="" v-model="form.name"/>
   <span class="glyphicon glyphicon-user form-control-feedback"></span>
   <transition name="fade">
    <span class="help-block" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
   </transition>
  </div>
  <div class="form-group has-feedback " :class="{ 'has-error': form.errors.has('apellido') }">
   <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value="" v-model="form.apellido"/>
   <span class="glyphicon glyphicon-user form-control-feedback"></span>
   <transition name="fade">
    <span class="help-block" v-if="form.errors.has('apellidos')" v-text="form.errors.get('apellido')"></span>
   </transition>
  </div>
  <div class="form-group has-feedback" :class="{ 'has-error': form.errors.has('email') }">
   <input type="email" class="form-control" placeholder="Correo" name="email" value="" v-model="form.email"/>
   <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
   <transition name="fade">
    <span class="help-block" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
   </transition>
  </div>
  <div class="form-group has-feedback" :class="{ 'has-error': form.errors.has('telefono') }">
   <input type="text" class="form-control" placeholder="Ingrese Nº Telefono" name="telefono" value="" v-model="form.telefono"/>
   <span class="glyphicon glyphicon-phone form-control-feedback"></span>
   <transition name="fade">
    <span class="help-block" v-if="form.errors.has('telefono')" v-text="form.errors.get('telefono')"></span>
   </transition>
  </div>
  <div class="form-group has-feedback" :class="{ 'has-error': form.errors.has('password') }">
   <input type="password" class="form-control" placeholder="Contraseña" name="password" v-model="form.password"/>
   <span class="glyphicon glyphicon-lock form-control-feedback"></span>
   <transition name="fade">
    <span class="help-block" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></span>
   </transition>
  </div>
  <div class="form-group has-feedback">
   <input type="password" class="form-control" placeholder=" Repetir contraseña" name="password_confirmation" v-model="form.password_confirmation"/>
   <span class="glyphicon glyphicon-lock form-control-feedback"></span>
  </div>
  <div class="row">
   <div class="col-xs-7">
    &nbsp;
   </div>
   <div class="col-xs-4 col-xs-push-1">
    <button type="submit" class="btn btn-primary btn-block btn-flat" :disabled="form.errors.any()" v-text=""><i v-if="form.submitting" class="fa fa-refresh fa-spin"></i>Entrar</button>
   </div>
  </div>
 </form>

</template>

<style src="./fade.css"></style>

<script>

  import Form from 'acacha-forms'
  import initialitzeIcheck from './InitializeIcheck'
  import redirect from './redirect'

  export default {
    mixins: [initialitzeIcheck, redirect],
    data: function () {
      return {
        form: new Form({ documento: '', numero: '', name: '', apellido: '', email: '', telefono: '', password: '', password_confirmation: ''})
      }
    },
    methods: {
      submit () {
        this.form.post('/register')
          .then(response => {
            var component = this;
            setTimeout(function(){
              component.redirect(response)
            }, 2500);
          })
          .catch(error => {
            console.log(this.trans('adminlte_lang_message.registererror') + ':' + error)
          })
      },
      clearErrors (name) {
        if (name === 'password_confirmation') {
          name = 'password'
          this.form.errors.clear('password_confirmation')
        }
        this.form.errors.clear(name)
      }
    },
  }

</script>

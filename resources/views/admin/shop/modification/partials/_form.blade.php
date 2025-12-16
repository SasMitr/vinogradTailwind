<x-admin.forms.form>

    <x-slot:method>patch</x-slot>
    <x-slot:route>{{route('admin.modification.create')}}</x-slot>
    <x-slot:route>{{isset($modification) ? route('admin.modification.update', $modification) : route('admin.modification.create')}}</x-slot>
    <x-slot:modules>{{isset($modification) ? 'm_edit' : 'm_create'}}</x-slot>
    <x-slot:id>{{isset($modification) ? $modification->id : null}}</x-slot>

    <x-admin.forms.input type="text" name="name" title="Название (В меню)" value="{{old('name', isset($modification) ? $modification->name : '')}}"/>
    <x-admin.forms.input type="number" name="weight" title="Вес" value="{{old('weight', isset($modification) ? $modification->weight : '')}}"/>
    <x-admin.forms.button text="{{isset($modification) ? 'Сохранить' : 'Добавить'}}"/>

</x-admin.forms.form>

<h1>Регистрация</h1>

<!-- Открываем форму !-->
<?=CHtml::form(); ?>
 <!-- То самое место где будут выводиться ошибки
     если они будут при валидации !-->
<?=CHtml::errorSummary($form); ?><br>

    <table id="form2" border="0" width="400" cellpadding="10" cellspacing="10">
         <tr>
            <!-- Выводим поле для логина !-->
            <td width="150"><?=CHtml::activeLabel($form, 'username'); ?></td>
            <td><?=CHtml::activeTextField($form, 'username') ?></td>
         </tr>
        <tr>
            <!-- Выводим поле для пароля !-->
            <td><?=CHtml::activeLabel($form, 'password'); ?></td>
            <td><?=CHtml::activePasswordField($form, 'password') ?></td>
         </tr>
        <tr>
            <!-- Выводим капчу !-->
            <td><?php $this->widget('CCaptcha', array('buttonLabel' => '<br>[новый код]')); ?></td>
             <td><?=CHtml::activeTextField($form,'verifyCode'); ?></td>
        </tr>
        <tr>
            <td></td>
            <!-- Кнопка "регистрация" !-->
             <td><?=CHtml::submitButton('Регистрация', array('id' => "submit")); ?></td>
        </tr>
    </table>

<!-- Закрываем форму !-->
 <?=CHtml::endForm(); ?>
<?php


    $t        = '    ';
    $tt       = '        ';
    $ttt      = '            ';
    $tttt     = '                ';
    $ttttt    = '                    ';
    $tttttt   = '                        ';
    $ttttttt  = '                            ';

    $formElements = array();
    $formValidatorElements = array();
    
    for ($i = 0; $i < $form->length; $i++){
        // $form properties
        if($i[$i]->form_properties){
            $prop = $form[$i]->form_properties[0];

            $formElements[] = zfHead($prop);
            $formValidatorElements[] = zfValidatorHead($prop);
        }

        // $form line text
        if($form[$i]->line_text){
            $lineText = $form[$i]->line_text[0];

            $formElements[] = text($lineText);
            $formValidatorElements[] = textValidator($lineText, 'text');
        }

        // $form $number
        if($form[$i]->line_number){
            $lineNumber = $form[$i]->line_number[0];

            $formElements[] = text(lineNumber);
            $formValidatorElements[] = textValidator(lineNumber, '$number');
        }

        // $form $paragraph
        if($form[$i]->line_paragraph){
            $lineParagraph = $form[$i]->line_paragraph[0];

            $formElements[] = text(lineParagraph);
            $formValidatorElements[] = textValidator(lineParagraph, '$paragraph');
        }

        // $form $password
        if($form[$i]->line_password){
            $linePassword = $form[$i]->line_password[0];

            $formElements[] = text(linePassword);
            $formValidatorElements[] = textValidator(linePassword, '$password');
        }

        // $form password_verify
        if($form[$i]->line_password_verify){
            $linePasswordVerify = $form[$i]->line_password_verify[0];

            $formElements[] = text(linePasswordVerify);
            $formValidatorElements[] = textValidator(linePasswordVerify, 'password_verify');
        }

        // $form checkboxes
        if($form[$i]->line_checkbox ){
            $lineCheckboxes = $form[$i]->line_checkbox[0];

            $formElements[] = text(lineCheckboxes);
            $formValidatorElements[] = textValidator(lineCheckboxes, 'checkboxes');
        }

        // $form dropdown
        if($form[$i]->line_dropdown ){
            $lineDropdown = $form[$i]->line_dropdown[0];

            $formElements[] = text(lineDropdown);
            $formValidatorElements[] = textValidator(lineDropdown, 'dropdown');
        }

        // $form radio
        if($form[$i]->line_radio ){
            $lineRadio = $form[$i]->line_radio[0];

            $formElements[] = text(lineRadio);
            $formValidatorElements[] = textValidator(lineRadio, 'radio');
        }

        // $form $email
        if($form[$i]->line_email ){
            $lineEmail = $form[$i]->line_email[0];

            $formElements[] = text(lineEmail);
            $formValidatorElements[] = textValidator(lineEmail, '$email');
        }

        // $form date
        if($form[$i]->line_date ){
            $lineDate = $form[$i]->line_date[0];

            $formElements[] = text(lineDate);
            $formValidatorElements[] = textValidator(lineDate, 'date');
        }

        // $form $upload
        if($form[$i]->line_upload ){
            $lineUpload = $form[$i]->line_upload[0];

            $formElements[] = text(lineUpload);
            $formValidatorElements[] = textValidator(lineUpload, '$upload');
        }

        // $form credit card
        if($form[$i]->line_credit_card ){
            $lineCreditCard = $form[$i]->line_credit_card[0];

            $formElements[] = text(lineCreditCard);
            $formValidatorElements[] = textValidator(lineCreditCard, 'credit_card');
        }

        // $form $url
        if($form[$i]->line_url ){
            $lineUrl = $form[$i]->line_url[0];

            $formElements[] = text(lineUrl);
            $formValidatorElements[] = textValidator(lineUrl, '$url');
        }

        // $form $hidden
        if($form[$i]->line_hidden ){
            $lineHidden = $form[$i]->line_hidden[0];

            $formElements[] = text($lineHidden);
            //$formValidatorElements[] = textValidator(lineHidden, '$hidden');
        }

        //console->log($form[$i]);
    }

    $formElements[] = csrf();
    $formElements[] = zfFooter();

    $formValidatorElements[] = zfValidatorFooter();

    var_dump($formElements);
    
    //$('#form_file')->html( $formElements );

    //$('#form_file_validator')->html( $formValidatorElements );

    //$('#form_controller')->html(zfController($form[0]));

    //$('#form_view')->html(zfView($form, 'view'));

   // $('#form_row')->html(zfView($form, 'row'));

    //$('#form_view_helper')->html(zfViewHelper());


function zfHead($prop){
    $file =
        'namespace ' + $prop->namespace + '\\$form; <br>' +
            '<br>' +
            'use Zend\\Captcha; <br>' +
            'use Zend\\$form\\Element; <br>' +
            'use Zend\\$form\\$form; <br>' +
            '<br>' +
            'class ' + $prop->class_name + ' extends $form <br>' +
            '<br>' +
            '{ <br>' +
            $t + "public function __construct($name = null) <br>" +
            $t + "{ <br>" +
                $tt + "parent::__construct('" + $prop->namespace->toLowerCase() + "'); <br>" +
                $tt + "<br>" +
                $tt + '$this->setAttribute(\'method\', \'post\'); <br>' +
                $tt + "<br>";

    return ($file);
}

function  fileG($prop){
    $file =
        'namespace ' + $prop->namespace + '\\$form; <br>' +
            '<br>' +
            'use Zend\\InputFilter\\Factory as InputFactory; <br>' +
            'use Zend\\InputFilter\\InputFilter; <br>' +
            'use Zend\\InputFilter\\InputFilterAwareInterface; <br>' +
            'use Zend\\InputFilter\\InputFilterInterface; <br>' +
            '<br>' +
            'class ' + $prop->class_name + '$validator implements InputFilterAwareInterface <br>' +
            '<br>' +
            '{ <br>' +
            $t + "protected $inputFilter; <br>" +
            $t + "<br>" +
            $t + "public function setInputFilter(InputFilterInterface $inputFilter) <br>" +
            $t + "{ <br>" +
                $tt + 'throw new \\Exception("Not used"); <br>' +
            $t + "} <br>" +
            $t + "<br>" +
            $t + "public function getInputFilter() <br>" +
            $t + "{ <br>" +
                $tt + "if (!$this->inputFilter) <br>" +
                $tt + "{ <br>" +
                    $ttt + '$inputFilter = new InputFilter(); <br>' +
                    $ttt + '$factory = new InputFactory(); <br>' +
                    $ttt + "<br>" +
                $tt + "<br>";

    return $file;
}

function zfFooter (){
    $file =
            $tt + "<br>" +
        $t + "} <br>" +
    '} <br>';

    return ($file);
}

function zfValidatorFooter (){
    $file =
                $ttt + "<br>" +
            $tt + "} <br>" +
        $t + "} <br>" +
    '} <br>';

    return ($file);
}

function csrf(){
    $csrfForm =
    $tt + '$this->add(array( <br>' +
        $ttt + "'$name' => 'csrf', <br>" +
        $ttt + "'$type' => 'Zend\\$form\\Element\\Csrf', <br>" +
    $tt + "));";
    return ($csrfForm);
}

function hidden (){
    $hiddenForm =
    $tt + '$this->add(array( <br>' +
        $ttt + "'$name' => '$hidden', <br>" +
        $ttt + "'$type' => 'Zend\\$form\\Element\\$hidden', <br>" +
    $tt + "));";
    return ($hiddenForm);
}

/**
 * text field
 * @param $lineText
 * @return {String}
 */
function  text($lineText){

    $textForm =
        $tt + '$this->add(array( <br>' +
            $ttt + "'$name' => '" + $lineText->$name + "', <br>" +
            $ttt + "'$type' => '" + $lineText->$type + "', <br>" +
            $ttt + "'attributes' => array( <br>" +
                formAttr($lineText->$data) +
            $ttt + "), <br>" +
            $ttt + "'$options' => array( <br>" +
                formOptions($lineText->$data) +
            $ttt + "), <br>" +
        $tt + ")); <br> <br>";
    return ($textForm);
}

/**
 * @param $lineText
 * @param $val
 * @return {String}
 */
function textValidator ($lineText, $val){

    $params = '';
    $hasRequired = $lineText->$data->required ? $ttt + "'required' => " + $lineText->$data->required + ", <br>" : '';

    if($val === '$email'){
        $params = formValidatorEmail($lineText->$data, 'EmailAddress') +
            formValidatorEmail($lineText->$data, 'NotEmpty');
    }

    $textForm =
    $tt + '$inputFilter->add($factory->createInput([ <br>' +
        $ttt + "'$name' => '" + $lineText->$name + "', <br>" +
        $hasRequired +
        $ttt + "'filters' => array( <br>" +
            $tttt + "array('$name' => 'StripTags'), <br>" +
            $tttt + "array('$name' => 'StringTrim'), <br>" +
        $ttt + "), <br>" +
        $ttt + "'validators' => array( <br>" +
            formValidatorOther($lineText->$data, 'StringLength') +
            $params +
            formValidatorNumber($lineText->$data) +
            formValidatorToken($lineText->$data) +
            formValidatorDate($lineText->$data) +
            formValidatorDropdown($lineText->$data) +
            formValidatorUpload($lineText->$data) +
            formValidatorCreditCard($lineText->$data) +
        $ttt + "), <br>" +
    $tt + "])); <br> <br>";
    return ($textForm);
}

/**
 * @param $d
 * @return {String}
 */
function formValidatorUpload ($d){

    $filesizeMin = ''; $filefilessizeMin = ''; $filecountMin = ''; $filewordcountMin = '';
        $filesizeMax = ''; $filefilessizeMax = ''; $filecountMax = ''; $filewordcountMax = '';
        $minheight = ''; $maxheight = ''; $minwidth = ''; $maxwidth = '';
        $fileextension = ''; $fileexcludeextension = ''; $filemimetype = '';
        $fileexcludemimetype = ''; $fileexists = ''; $fileiscompressed = '';
        $fileisimage = ''; $toReturn = '';

    if($d->filesize){
        if($d->filesize->min && $d->filesize->min != ''){
            $filesizeMin = $tttttt + "'min' => '" + $d->filesize->min  + "', <br>";
        }
        if($d->filesize->max && $d->filesize->max != ''){
            $filesizeMax = $tttttt + "'max' => '" + $d->filesize->max  + "', <br>";
        }
    }

    if($d->filefilessize){
        if($d->filefilessize->min && $d->filefilessize->min != ''){
            $filefilessizeMin = $tttttt + "'min' => '" + $d->filefilessize->min  + "', <br>";
        }
        if($d->filefilessize->max && $d->filefilessize->max != ''){
            $filefilessizeMax = $tttttt + "'max' => '" + $d->filefilessize->max  + "', <br>";
        }
    }

    if($d->filecount){
        if($d->filecount->min && $d->filecount->min != ''){
            $filecountMin = $tttttt + "'min' => '" + $d->filecount->min  + "', <br>";
        }
        if($d->filefilessize->max && $d->filefilessize->max != ''){
            $filecountMax = $tttttt + "'max' => '" + $d->filecount->max  + "', <br>";
        }
    }

    if($d->filewordcount){
        if($d->filewordcount->min && $d->filewordcount->min != ''){
            $filewordcountMin = $tttttt + "'min' => '" + $d->filewordcount->min  + "', <br>";
        }
        if($d->filewordcount->max && $d->filewordcount->max != ''){
            $filewordcountMax = $tttttt + "'max' => '" + $d->filewordcount->max  + "', <br>";
        }
    }

    if($d->fileimagesize){
        if($d->fileimagesize->$minheight && $d->fileimagesize->$minheight != ''){
            $minheight = $tttttt + "'$minwidth' => '" + $d->fileimagesize->$minheight  + "', <br>";
        }
        if($d->filewordcount->$maxheight && $d->fileimagesize->$maxheight != ''){
            $maxheight = $tttttt + "'$maxwidth' => '" + $d->fileimagesize->$maxheight  + "', <br>";
        }
        if($d->filewordcount->$minwidth && $d->fileimagesize->$minwidth != ''){
            $minwidth = $tttttt + "'$minheight' => '" + $d->fileimagesize->$minwidth  + "', <br>";
        }
        if($d->filewordcount->$maxwidth && $d->fileimagesize->$maxwidth != ''){
            $maxwidth = $tttttt + "'$maxheight' => '" + $d->fileimagesize->$maxwidth  + "', <br>";
        }
    }

    if($d->$fileextension){
        if($d->$fileextension && $d->$fileextension != ''){
            $fileextension = $tttttt + $d->$fileextension  + ", <br>";
        }
    }

    if($d->$fileexcludeextension){
        if($d->$fileexcludeextension && $d->$fileexcludeextension != ''){
            $fileexcludeextension = $tttttt + $d->$fileexcludeextension  + ", <br>";
        }
    }

    if($d->$filemimetype){
        if($d->$filemimetype && $d->$filemimetype != ''){
            $filemimetype = $tttttt + $d->$filemimetype  + ", <br>";
        }
    }

    if($d->$fileexcludemimetype){
        if($d->$fileexcludemimetype && $d->$fileexcludemimetype != ''){
            $fileexcludemimetype = $tttttt + $d->$fileexcludemimetype  + ", <br>";
        }
    }

    if($d->$fileexists){
        if($d->$fileexists && $d->$fileexists != ''){
            $fileexists = $tttttt + $d->$fileexists  + ", <br>";
        }
    }

    if($d->$fileiscompressed){
        if($d->$fileiscompressed && $d->$fileiscompressed != ''){
            $fileiscompressed = $tttttt + $d->$fileiscompressed  + ", <br>";
        }
    }

    if($d->$fileisimage){
        if($d->$fileisimage && $d->$fileisimage != ''){
            $fileisimage = $tttttt + $d->$fileisimage  + ", <br>";
        }
    }


    $toReturn += genericValidator('Size', 'array', [$filesizeMin, $filesizeMax], '');
    $toReturn += genericValidator('FilesSize', 'array', [$filefilessizeMin, $filefilessizeMax], '');
    $toReturn += genericValidator('Count', 'array', [$filecountMin, $filecountMax], '');
    $toReturn += genericValidator('WordCount', 'array', [$filewordcountMin, $filewordcountMax], '');
    $toReturn += genericValidator('ImageSize', 'multy_array', [$minheight, $maxheight, $minwidth, $maxwidth], '');
    $toReturn += genericValidator('Extension', 'string', [], $fileextension);
    $toReturn += genericValidator('ExcludeExtension', 'string', [], $fileexcludeextension);
    $toReturn += genericValidator('MimeType', 'string', [], $filemimetype);
    $toReturn += genericValidator('ExcludeMimeType', 'string', [], $fileexcludemimetype);
    $toReturn += genericValidator('Exists', 'string', [], $fileexists);
    $toReturn += genericValidator('IsCompressed', 'string', [], $fileiscompressed);
    $toReturn += genericValidator('IsImage', 'string', [], $fileisimage);

    return ($toReturn);
}

/**
 * @param $l
 * @param $v
 * @return {String}
 */
function formValidatorOther($l, $v){

    $$lMin = '';
        $lMax = '';
        $lengthForm = '';

    if($l->length){
        if($l->length->min && $l->length->min != ''){
            $lMin = $tttttt + "'min' => '" + $l->length->min  + "', <br>";
        }
        if($l->length->max && $l->length->max != ''){
            $lMax = $tttttt + "'max' => '" + $l->length->max  + "', <br>";
        }
    }

    if($lMin != '' || $lMax != ''){
        $lengthForm =
            $tttt + "array ( <br>" +
                $ttttt + "'$name' => '" + $v + "', <br>" +
                $ttttt + "'$options' => array( <br>" +
                    $tttttt + "'encoding' => 'UTF-8', <br>" +
                    $lMin + $lMax +
                $ttttt + "), <br>" +
            $tttt + "), <br>";
    }
    return ($lengthForm);
}

/**
 * @param $d
 * @return {String}
 */
function formValidatorCreditCard ($d){

    $institutes = '';
        $cc = '';

    if($d->$institutes){
        if($d->$institutes && $d->$institutes != ''){
            $institutes = $tttttt + "'$type' => \\Zend\\$validator\\CreditCard::" + $d->$institutes  + ", <br>";
        }
    }

    if($institutes != ''){
        $cc =
            $tttt + "array ( <br>" +
                $ttttt + "'$name' => 'CreditCard', <br>" +
                $ttttt + "'$options' => array( <br>" +
                    $institutes +
                $ttttt + "), <br>" +
            $tttt + "), <br>";
    }
    return (cc);
}

/**
 * @param $l
 * @return {String}
 */
function formValidatorOtherX ($l){

    $$validation = '';

    if($l->date_validation){
        $validation += $tttt + "array(" + "<br>";
            $validation += $ttttt + "'$name' => 'Between'" + "<br>";
            $validation += $ttttt + "'$options' => array(" + "<br>";
                if($l->date_validation->min != ''){
                    $validation += $tttttt + "'min' => '" + $l->date_validation->min  + "', <br>";
                }
                if($l->date_validation->max != ''){
                    $validation += $tttttt + "'max' => '" + $l->date_validation->min  + "', <br>";
                }
            $validation += $ttttt + ")," + "<br>";
        $validation += $tttt + ")," + "<br>";
    }
    return ($validation);
}
/**
 *
 * @param $l
 * @param $v
 * @return {String}
 */
function formValidatorEmail ($l, $v){

    $lMessages = '';
    $lengthForm = '';

    if($l && $v === 'EmailAddress'){
        $lMessages = $tttttt + "'messages' => array( <br>";
            $lMessages += $ttttttt + "'emailAddressInvalidFormat' => '" + $l->messages->emailAddressInvalidFormat  + "', <br>";
        $lMessages += $tttttt + ") <br>";
    }
    if($l && $v === 'NotEmpty'){
        $lMessages = $tttttt + "'messages' => array( <br>";
            $lMessages += $ttttttt + "'isEmpty' => '" + $l->messages->isEmpty  + "', <br>";
        $lMessages += $tttttt + ") <br>";
    }

    if($lMessages != ''){
        $lengthForm =
            $tttt + "array ( <br>" +
                $ttttt + "'$name' => '" + $v + "', <br>" +
                $ttttt + "'$options' => array( <br>" +
                    $lMessages +
                $ttttt + "), <br>" +
            $tttt + "), <br>";
    }
    return ($lengthForm);
}

/**
 * @param $p
 * @return {String}
 */
function formValidatorToken ($p){
    $tokenForm = '';

    if($p && $p->token){
        $tokenForm =
            $tttt + "array ( <br>" +
                $ttttt + "'$name' => 'identical', <br>" +
                $ttttt + "'$options' => array( <br>" +
                    $tttttt + "'token' => '" + $p->token  + "', <br>" +
                $ttttt + "), <br>" +
            $tttt + "), <br>" +
            "<br>";
    }
    return ($tokenForm);
}

function formValidatorNumber ($digits){
    $digitsName = '';
    if($digits->validators && $digits->validators->html5 == 0 ){
        if($digits->validators->$name){
            $digitsName += $tttt + "array ( <br>" +
                $ttttt + "'$name' => '" + $digits->validators->$name + "', <br>" +
            $tttt + "), <br>" +
            " <br>";
        }
    }

    return ($digitsName);
}

function formValidatorDropdown ($select){
    $tokenForm = '';
    $key = array();

    if($select && $select->dropdownValues){

        for($i=0; $i<$select->dropdownValues->length; $i++){
            $key[] = $i;
        }

        $tokenForm =
            $tttt + "array ( <br>" +
                $ttttt + "'$name' => 'InArray', <br>" +
                $ttttt + "'$options' => array( <br>" +
                    $tttttt + "'haystack' => array(" + key  + ") <br>" +
                    $tttttt + "'messages' => array(, <br>" +
                        $ttttttt + "'notInArray' => '" + $select->notinarray + "' <br>" +
                    $tttttt + "), <br>" +
                $ttttt + "), <br>" +
                $tttt + "), <br>" +
                "<br>";
    }
    return ($tokenForm);
}

/**
 * $form $attr $validator
 * @param $attr
 * @return {String}
 */

function formAttr ($attr){
    $attrs = '';

    if($attr->class != ''){
        $attrs += $tttt + "'class' => '" + $attr->class  + "', <br>";
    }
    if($attr->id != ''){
        $attrs += $tttt + "'id' => '" + $attr->id + "', <br>";
    }
    if($attr->placeholder && $attr->placeholder != ''){
        $attrs += $tttt + "'placeholder' => '" + $attr->placeholder + "', <br>";
    }
    if($attr->required != 'false'){
        $attrs += $tttt + "'required' => 'required', <br>";
    }
    if($attr->default && $attr->default != 'false'){
        $attrs += $tttt + "'value' => '" + $attr->default  + "', <br>";
    }
    if($attr->date){
        if($attr->date->min != ''){
            $attrs += $tttt + "'min' => '" + $attr->date->min  + "', <br>";
        } else {
            $attrs += $tttt + "'min' => '1970-01-01', <br>";
        }
        if($attr->date->max != ''){
            $attrs += $tttt + "'max' => '" + $attr->date->max  + "', <br>";
        } else {
            $attrs += $tttt + "'max' => " + date() + ", <br>";
        }
        $attrs += $tttt + "'step' => '1', <br>";
    }

    if($attr->length){
        if($attr->length->min_str){
            $attrs += $tttt + "'min' => '" + $attr->length->min_str  + "', <br>";
        }
        if($attr->length->max_str ){
            $attrs += $tttt + "'max' => '" + $attr->length->max_str  + "', <br>";
        }
        if($attr->length->min_str || $attr->length->max_str){
            $attrs += $tttt + "'step' => '1', <br>";
        }
    }

    if($attr->validators){
        if($attr->validators->html5 == 1){
            $attrs += $tttt + "'$type' => '$number', <br>";
        }
    }

    return ($attrs);
}

function dateX (){
    $d = new Date();
    $Ymd = $d->getFullYear() + '-' + $d->getMonth() + '-' + $d->getDay();

    return Ymd;
}

/**
 * @param $opt
 * @return {String}
 */
function formOptions ($opt){
    $options = '';

    if($opt->label != ''){
        $options += $tttt + "'label' => '" + $opt->label  + "', <br>";
    }

    if($opt->label_id || $opt->label_class){
        $options += $tttt + "'label_attributes' => array(" + "<br>";
            if($opt->label_class){
                $options += $ttttt + "'class' => '" + $opt->label_class  + "', <br>";
            }
            if($opt->label_id){
                $options += $ttttt + "'id' => '" + $opt->label_id  + "', <br>";
            }
        $options += $tttt + ")," + "<br>";
    }

    if($opt->innerData){
        $options += $tttt + "'value_options' => array(" + "<br>";
            for($i = 0; $i < $opt->innerData->length; $i++){
                if($opt->innerData[$i]->label){
                    $options += $ttttt + "'" + $i + "' => '" + $opt->innerData[$i]->label  + "', <br>";
                }
            }
        $options += $tttt + ")," + "<br>";
    }

    if($opt->dropdownValues){
        $options += $tttt + "'value_options' => array(" + "<br>";
            for($i = 0; $i < $opt->dropdownValues->length; $i++){
                if($opt->dropdownValues[$i]->dropdown_label){
                    $options += $ttttt + "'" + $i + "' => '" + $opt->dropdownValues[$i]->dropdown_label  + "', <br>";
                }
            }
        $options += $tttt + ")," + "<br>";
    }

    return ($options);
}

/**
 * @param $prop
 * @return {String}
 */
function zfController($prop){
    $props = $prop->form_properties[0];
    $file =
        "namespace " + $props->namespace + "\\Controller; <br>" +
        "<br>" +
        "use Zend\\Mvc\\Controller\\AbstractActionController; <br>" +
        "use Zend\\View\\Model\\ViewModel; <br>" +
        "use " + $props->namespace + "\\$form\\" + $props->class_name + "; <br>" +
        "use " + $props->namespace + "\\$form\\" + $props->class_name + '$validator; <br>' +
        "use " + $props->namespace + "\\Model\\" + $props->model_name + "; <br>" +
        "<br>" +
        "public function indexAction() <br>" +
        "{ <br>" +
            $t + '$form = new ' + $props->class_name + "(); <br>" +
            $t + '$request = $this->getRequest(); <br>' +
            '<br>' +
            $t + "if($request->isPost()) <br>" +
            $t + "{ <br>" +
                $tt + '$user = new ' + $props->model_name + "(); <br>" +
                $tt + "<br>" +
                $tt + '$formValidator = new ' + $props->class_name + '$validator(); <br>' +
                $tt + "{ <br>" +
                    $ttt + '$form->setInputFilter($formValidator->getInputFilter()); <br>' +
                    $ttt + '$form->setData($request->getPost()); <br>' +
                $tt + "} <br>" +
                $tt + " <br>" +
                $tt + "if($form->isValid()){ <br>" +
                $tt + "{ <br>" +
                    $ttt + '$user->exchangeArray($form->getData()); <br>' +
                $tt + "} <br>" +
            $t + "} <br>" +
            $t + "<br>" +
            $t + "return ['$form' => $form]; <br>" +
        "} <br>" +
        '<br>';

    return ($file);
}

function zfView($data, $type){
    $fileView = '';

    for ($i = 0; $i < $data->length; $i++){
        if($data[$i]->line_checkbox){
            $checkbox = $data[$i]->line_checkbox[0]->$name;
            $fileView += checkbox != '' ? toView(checkbox, $type) : toView('checkbox field with no $name', $type);
        } else if ($data[$i]->line_credit_card){
            $credit_card = $data[$i]->line_credit_card[0]->$name;
            $fileView += credit_card != '' ? toView(credit_card, $type) : toView('credit_card field with no $name', $type);
        } else if ($data[$i]->line_date){
            $date = $data[$i]->line_date[0]->$name;
            $fileView += line_date != '' ? toView(date, $type) : toView('date field with no $name', $type);
        } else if ($data[$i]->line_dropdown){
            $dropdown = $data[$i]->line_dropdown[0]->$name;
            $fileView += dropdown != '' ? toView(dropdown, $type) : toView('dropdown field with no $name', $type);
        } else if ($data[$i]->line_email){
            $email = $data[$i]->line_email[0]->$name;
            $fileView += $email != '' ? toView($email, $type) : toView('$email field with no $name', $type);
        } else if ($data[$i]->line_hidden){
            $hidden = $data[$i]->line_hidden[0]->$name;
            $fileView += $hidden != '' ? toView($hidden, $type) : toView('$hidden field with no $name', $type);
        } else if ($data[$i]->line_number){
            $number = $data[$i]->line_number[0]->$name;
            $fileView += $number != '' ? toView($number, $type) : toView('$number field with no $name', $type);
        } else if ($data[$i]->line_paragraph){
            $paragraph = $data[$i]->line_paragraph[0]->$name;
            $fileView += $paragraph != '' ? toView($paragraph, $type) : toView('$paragraph field with no $name', $type);
        } else if ($data[$i]->line_password){
            $password = $data[$i]->line_password[0]->$name;
            $fileView += $password != '' ? toView($password, $type) : toView('$password field with no $name', $type);
        } else if ($data[$i]->line_password_verify){
            $password_verify = $data[$i]->line_password_verify[0]->$name;
            $fileView += password_verify != '' ? toView(password_verify, $type) : toView('password_verify field with no $name', $type);
        } else if ($data[$i]->line_radio){
            $radio = $data[$i]->line_radio[0]->$name;
            $fileView += radio != '' ? toView(radio, $type) : toView('radio field with no $name', $type);
        } else if ($data[$i]->line_text){
            $text = $data[$i]->line_text[0]->$name;
            $fileView += text != '' ? toView(text, $type) : toView('text field with no $name', $type);
        } else if ($data[$i]->line_upload){
            $upload = $data[$i]->line_upload[0]->$name;
            $fileView += $upload != '' ? toView($upload, $type) : toView('$upload field with no $name', $type);
        } else if ($data[$i]->line_url){
            $url = $data[$i]->line_url[0]->$name;
            $fileView += $url != '' ? toView($url, $type) : toView('$url field with no $name', $type);
        }
    }

    return $fileView;
}

function toView ($name, $type)
{
    $form = '';
    if($type == 'view'){
        $form =
            "echo $this->formLabel($form->get('" + $name + "'));" + "<br>" +
                "echo $this->formElement($form->get('" + $name + "'));" + "<br>" +
                "echo $this->formElementErrors($form->get('" + $name + "'));" + "<br>";
    } else if ($type == 'row') {
        $form = "echo $this->formElementErrors($form->get('" + $name + "'));";
    }
    return $form;
}

function genericValidator ($nameV, $typeV, $arrayV, $stringV){
    $options = '';

    if($typeV == 'string'){
        $options = $stringV;
    }
    if($typeV == 'array'){
        $options = $arrayV[0] +  $arrayV[1];
    }
    if($typeV == 'multy_array'){
        $options = $arrayV[0] + $arrayV[1] + $arrayV[2] + $arrayV[3];
    }

    $validator =
        $tttt + "array ( <br>" +
            $ttttt + "'$name' => '" + $nameV + "', <br>" +
            $ttttt + "'$options' => array( <br>" +
                $options +
            $ttttt + "), <br>" +
        $tttt + "), <br>";

    return $options != '' ? $validator : '';
}

function zfViewHelper(){
    $file =
        'namespace Formgen\\View\\Helper; <br>' +
        '<br>' +
        'use Zend\\View\\Helper\\AbstractHelper; <br>' +
        '<br>' +
        'class RenderForm extends AbstractHelper <br>' +
        '<br>' +
        '{ <br>' +
        '&nbsp; public function __invoke($form) <br>' +
        '&nbsp; { <br>' +
        "&nbsp; &nbsp; $form->prepare(); <br>" +
        '&nbsp; &nbsp; <br>' +
        "&nbsp; &nbsp; return $output; <br>" +
        '&nbsp; } <br>' +
        '} <br>';

    return ($file);
}

    
<?php

$FILTER_NAME = $arParams["FILTER_NAME"];

// Custom filters for sections Ордена и медали, ...
if (isset($arResult['ITEMS']['PROPERTY_82'])) {
    // RARITY
    $rarityValues = [
        'Довольно редкая(Р)' => 'Довольно редкая(Р)',
        'Редкая(Р1)' => 'Редкая(Р1)',
        'Весьма редкая(Р2)' => 'Весьма редкая(Р2)',
        'Очень редкая(Р3)' => 'Очень редкая(Р3)',
        'Редчайшая(Р4)' => 'Редчайшая(Р4)',
    ];

    $valChecked = !isset($arResult['ITEMS']['PROPERTY_82']['~INPUT_VALUE'][0]);
    $checkedAttr = $valChecked ? ' selected="selected"' : '';
    $arResult['ITEMS']['PROPERTY_82']['INPUT'] = '<select name="' . $FILTER_NAME . '_pf[RARITY]" class="filter-select"><option value=""' . $checkedAttr . '></option>';
    // For applying 2-col width in template
    $arResult['ITEMS']['PROPERTY_82']['TYPE'] = 'RANGE';

    foreach ($rarityValues as $val => $label) {
        $valChecked = $val == $arResult['ITEMS']['PROPERTY_82']['~INPUT_VALUE'];
        $checkedAttr = $valChecked ? ' selected="selected"' : '';
        $arResult['ITEMS']['PROPERTY_82']['INPUT'] .= '<option value="' . htmlspecialchars($val, ENT_QUOTES) . '"' . $checkedAttr . '>' . htmlspecialchars($label, ENT_QUOTES) . '</option>';
    }

    $arResult['ITEMS']['PROPERTY_82']['INPUT'] .= '</select>';

    // MATERIAL
    $propKey = 'PROPERTY_58';
    if (isset($arResult['ITEMS'][$propKey])) {
        $propName = 'MATERIAL';
        $arResult['ITEMS'][$propKey]['NAME'] = 'Материал';

        $listValues = [
            'Золото' => 'Золото',
            'Серебро' => 'Серебро',
            'Светлая бронза' => 'Светлая бронза',
            'Тёмная бронза' => 'Тёмная бронза',
        ];

        $valChecked = !isset($arResult['ITEMS'][$propKey]['~INPUT_VALUE'][0]);
        $checkedAttr = $valChecked ? ' selected="selected"' : '';
        $arResult['ITEMS'][$propKey]['INPUT'] = '<select name="' . $FILTER_NAME . '_pf[' . $propName . ']" class="filter-select"><option value=""' . $checkedAttr . '></option>';

        foreach ($listValues as $val => $label) {
            $valChecked = $val == $arResult['ITEMS'][$propKey]['~INPUT_VALUE'];
            $checkedAttr = $valChecked ? ' selected="selected"' : '';
            $arResult['ITEMS'][$propKey]['INPUT'] .= '<option value="' . htmlspecialchars($val, ENT_QUOTES) . '"' . $checkedAttr . '>' . htmlspecialchars($label, ENT_QUOTES) . '</option>';
        }

        $arResult['ITEMS'][$propKey]['INPUT'] .= '</select>';
    }

    // CONDITIO
    $propKey = 'PROPERTY_77';
    if (isset($arResult['ITEMS'][$propKey])) {
        $propName = 'CONDITIO';

        $listValues = [
            'Отличная(UNC)' => 'Отличная(UNC)',
            'Очень хорошая(XF)' => 'Очень хорошая(XF)',
            'Хорошая(F)' => 'Хорошая(F)',
            'Удовлетворительная(VG)' => 'Удовлетворительная(VG)',
            'Слабая(G)' => 'Слабая(G)',
        ];

        $valChecked = !isset($arResult['ITEMS'][$propKey]['~INPUT_VALUE'][0]);
        $checkedAttr = $valChecked ? ' selected="selected"' : '';
        $arResult['ITEMS'][$propKey]['INPUT'] = '<select name="' . $FILTER_NAME . '_pf[' . $propName . ']" class="filter-select"><option value=""' . $checkedAttr . '></option>';

        foreach ($listValues as $val => $label) {
            $valChecked = $val == $arResult['ITEMS'][$propKey]['~INPUT_VALUE'];
            $checkedAttr = $valChecked ? ' selected="selected"' : '';
            $arResult['ITEMS'][$propKey]['INPUT'] .= '<option value="' . htmlspecialchars($val, ENT_QUOTES) . '"' . $checkedAttr . '>' . htmlspecialchars($label, ENT_QUOTES) . '</option>';
        }

        $arResult['ITEMS'][$propKey]['INPUT'] .= '</select>';
    }
}



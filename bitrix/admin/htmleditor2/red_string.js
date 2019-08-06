arButtons['red_string'] = ['BXButton',
    {
        id: 'red_string',
        codeEditorMode: false,
        src: '/images/closed_c1.jpg',
        name: 'Добавить красную строку',
        handler: function()
        {
            this.bNotFocus = true;
            this.pMainObj.insertHTML(
                '<img src="/images/closed_c1_vis.jpg" __bxtagname="begin_closed_c" __bxcontainer="" />'
            );
            window.bBitrixTabs = true;
        }
    }
];

if(!window.lightMode)
{
    oBXEditorUtils.appendButton('red_string', arButtons['red_string'], 'standart');
}
else
{
    for(var bxi=0, bxl=arGlobalToolbar.length; bxi<bxl; bxi++)
    {
        if (arGlobalToolbar[bxi +1] == 'line_end')
            break;
    }
    arGlobalToolbar = arGlobalToolbar.slice(0, bxi).concat([arButtons['closed_content_1']], arGlobalToolbar.slice(bxi + 1));
}

$(function (){
    highlightMenu();
})

const highlightMenu = () => {
    const curUrl = location.href

    const menus = [
        'valores',
        'cultura',
        'projetosSociais',
        'contato',
        'lojas',
        'carreiras',
        'sejaUmFranqueado'
    ]

    let formatted = false

    for (let i = 0; i < menus.length; i++){
        let menuItem = menus[i]

        if(curUrl.includes(menuItem) && formatted === false){
            formatted = true

            if(menuItem.includes('valores') || menuItem.includes('cultura') || menuItem.includes('projetosSociais')){
                $(`#menu-sobre`)
                    .css('color','#0D65D9')
                    .css('fontWeight','bold')
            }else if(menuItem.includes('sejaUmFranqueado')){
                $(`#menu-franqueado`)
                    .css('backgroundColor','#0D65D9')
                    .css('fontWeight','bold')
                    .css('color','#F2F2F2')
            }else{
                $(`#menu-${menuItem}`)
                    .css('color','#0D65D9')
                    .css('fontWeight','bold')
            }


        }

        if(!formatted && (menus.length-1) == i){
            $(`#menu-home`)
                .css('color','#0D65D9')
                .css('fontWeight','bold')
        }
    }




}
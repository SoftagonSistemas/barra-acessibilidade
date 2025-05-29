=== Acessibilidade Menu + VLibras ===
Contributors: softagon
Donate link: https://www.softagon.com.br
Tags: accessibility, vlibras, libras, contrast, font-size, menu, a11y
Requires at least: 5.0
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 1.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Plugin de acessibilidade que cria menu "Acessibilidade" com subitens (Contraste, Aumentar/Diminuir fonte, Libras) e integra o widget VLibras.

== Description ==

O **Acessibilidade Menu + VLibras** é um plugin desenvolvido pela Softagon Sistemas que melhora a acessibilidade do seu site WordPress criando automaticamente um menu de navegação "Acessibilidade" com funcionalidades essenciais.

### Funcionalidades Principais

* **Menu Acessibilidade automático** - Cria menu pai "Acessibilidade" e 4 subitens
* **Contraste** - Inverte as cores da página para melhor visibilidade
* **Aumentar Fonte** - Aumenta o tamanho da fonte em 10%
* **Diminuir Fonte** - Diminui o tamanho da fonte em 10%
* **Libras** - Integra o widget VLibras do governo brasileiro
* **Página de configurações** - Painel administrativo em Configurações → Acessibilidade
* **Botão Reset** - Permite recriar o menu ao estado padrão
* **Multilíngue** - Suporte completo à internacionalização

### Classes CSS Disponíveis

O plugin adiciona automaticamente as seguintes classes CSS aos itens do menu:

* `.js-contraste` - Para alternar o modo de alto contraste
* `.js-aumentar` - Para aumentar o tamanho da fonte
* `.js-diminuir` - Para diminuir o tamanho da fonte  
* `.js-vlibras` - Para ativar o widget VLibras

### VLibras Integration

O plugin integra automaticamente o [VLibras](https://vlibras.gov.br/), ferramenta oficial do governo brasileiro para tradução de conteúdo em português para Libras (Língua Brasileira de Sinais).

### Personalização

Você pode personalizar os itens do menu através de:
1. Aparência → Menus → Selecionar "Acessibilidade"
2. Ativar "Opções da tela" para mostrar campos avançados
3. Editar rótulos, URLs, classes CSS e atributos conforme necessário

== Installation ==

### Instalação Automática

1. Acesse o painel administrativo do WordPress
2. Vá em Plugins → Adicionar Novo
3. Pesquise por "Acessibilidade Menu VLibras"
4. Clique em "Instalar Agora" e depois "Ativar"

### Instalação Manual

1. Faça o download do plugin
2. Extraia o arquivo na pasta `/wp-content/plugins/`
3. Ative o plugin através do menu Plugins no WordPress
4. Acesse Configurações → Acessibilidade para configurar

### Após a Instalação

1. O menu "Acessibilidade" será criado automaticamente
2. Acesse Configurações → Acessibilidade para opções avançadas
3. Adicione o menu "Acessibilidade" à sua localização de menu desejada

== Frequently Asked Questions ==

= O plugin funciona com qualquer tema? =

Sim! O plugin funciona com qualquer tema do WordPress que suporte menus de navegação padrão.

= Como personalizo a aparência dos botões? =

Você pode adicionar CSS personalizado para as classes `.js-contraste`, `.js-aumentar`, `.js-diminuir` e `.js-vlibras` através do Customizador ou arquivo CSS do tema.

= O VLibras aparece em todas as páginas? =

Sim, o widget VLibras é carregado automaticamente em todas as páginas do frontend quando o plugin está ativo.

= Como removo apenas um item do menu? =

Vá em Aparência → Menus, selecione "Acessibilidade" e remova os itens desejados. Use o botão "Resetar Menu" nas configurações para restaurar todos os itens.

= O plugin é compatível com LGPD/GDPR? =

O plugin não coleta dados pessoais. O VLibras é um serviço do governo brasileiro e suas políticas se aplicam conforme documentação oficial.

= Como traduzir para outros idiomas? =

O plugin suporta internacionalização. Crie arquivos `.po/.mo` na pasta `/languages/` ou use plugins de tradução como Loco Translate.

== Screenshots ==

1. Menu "Acessibilidade" criado automaticamente no painel de menus
2. Página de configurações em Configurações → Acessibilidade
3. Aba "Geral" com botão de reset do menu
4. Aba "Personalização" com instruções de customização
5. Aba "Sobre" com informações do plugin
6. Widget VLibras ativo no frontend

== Changelog ==

= 1.2 =
* Adicionado suporte completo à internacionalização
* Melhoradas práticas de segurança com sanitização
* Criado arquivo uninstall.php para limpeza
* Adicionadas traduções em inglês
* Implementado text domain 'barra-acessibilidade'
* Melhorado escape de dados com esc_html_e()
* Adicionado LICENSE.txt GPLv2+

= 1.1 =
* Adicionada página de configurações com abas
* Implementado botão "Resetar Menu" com nonce
* Criadas seções Geral, Personalização e Sobre
* Adicionado link "Configurações" na lista de plugins
* Melhorada documentação inline

= 1.0 =
* Lançamento inicial
* Criação automática do menu "Acessibilidade"
* Integração com VLibras
* Funcionalidades de contraste e ajuste de fonte
* Hooks de ativação e desativação

== Upgrade Notice ==

= 1.2 =
Esta versão adiciona suporte completo à internacionalização e melhora a segurança. Recomendada para todos os usuários.

= 1.1 =
Adiciona página de configurações avançadas e melhor controle do menu.

== Support ==

Para suporte técnico, entre em contato:

* **Site:** [Softagon Sistemas](https://www.softagon.com.br)
* **Email:** contato@softagon.com.br
* **Documentação VLibras:** [vlibras.gov.br](https://vlibras.gov.br/)

== Privacy Policy ==

Este plugin não coleta, armazena ou transmite dados pessoais dos usuários. A integração com VLibras está sujeita às políticas de privacidade do serviço governamental.

== Development ==

O código-fonte está disponível para contribuições e melhorias. Seguimos os padrões de codificação do WordPress e práticas de Clean Architecture.

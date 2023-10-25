<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        .container {
            width: 100%;
            min-width: 800px;
            height: 920px;
            background: #D1D2D3;
            position: relative;
        }

        .sidebar {
            width: 260px;
            height: 100%;
            background: #161616;
            position: absolute;
            display: flex;
            flex-direction: column; /* Organiza os itens verticalmente */
            justify-content: flex-end; /* Alinha os itens ao fundo */
            align-items: flex-start; /* Alinha os itens à esquerda */
            padding: 10px; /* Ajusta o espaçamento */
        }

        .sidebar-item {
            color: white;
            font-size: 16px;
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            word-wrap: break-word;
            margin: 4px 0; /* Adiciona espaço entre os itens */
        }

        .content {
            position: absolute;
            right: 0; /* Alinha o conteúdo à direita */
            top: 0;
            width: calc(100% - 260px);
            height: 100%;
            background: white;
            display: flex;
            flex-direction: column; /* Organiza os itens verticalmente */
            justify-content: flex-start; /* Alinha os itens ao topo */
            padding: 10px; /* Ajusta o espaçamento */
        }

        .section-title {
            color: #736D6D;
            font-size: 25px;
            font-weight: 400;
            word-wrap: break-word;
            text-align: right;
        }

        .button-label {
            color: #161616; /* Mudei a cor para um tom escuro que contrasta melhor com o fundo branco */
            font-size: 16px;
            font-weight: 400;
            word-wrap: break-word;
            text-align: right;
            margin: 4px 0; /* Adiciona espaço entre os itens */
        }

        .user-image {
            width: 50px;
            height: 52px;
            border-radius: 50%;
            margin: 20px 0; /* Adiciona espaço entre a imagem e o conteúdo */
        }

        .update-button {
            width: 199px;
            height: 40px;
            background: #7ABC37;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            margin-top: 10px; /* Adiciona espaço entre o botão e o conteúdo */
        }

        .filter-container,
        .found-container {
            width: 100%;
            height: auto;
            background: white;
            display: flex;
            flex-direction: column; /* Organiza os itens verticalmente */
            align-items: flex-start; /* Alinha os itens à esquerda */
            box-shadow: 0px 0px 20px rgba(122, 188, 55, 0.5);
            margin: 10px 0; /* Adiciona espaço entre os contêineres */
            padding: 10px; /* Ajusta o espaçamento */
        }

        .filter-container {
            margin-top: 10px; /* Adiciona espaço acima do primeiro contêiner */
        }

        .found-container {
            margin-top: 10px; /* Adiciona espaço acima do segundo contêiner */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-item">
                <div style="width: 18px; height: 18px; background: white"></div>
                <div>Painel</div>
            </div>
            <div class="sidebar-item">Wicked Fox</div>
            <div class="sidebar-item">
                <div style="width: 6px; height: 6px; background: white; margin-right: 8px;"></div>
                Configurações
            </div>
            <div class="sidebar-item">
                <div style="width: 16px; height: 21px; background: white; padding: 4px;"></div>
                Usuário
            </div>
            <img class="user-image" src="https://via.placeholder.com/50x52" />
        </div>

        <div class="content">
            <div class="filter-container">
                <div class="section-title">Filtros de Pesquisa</div>
            </div>
            <div class="found-container">
                <div class="section-title">Achados Encontrados</div>
            </div>
            <div class="section">
                <div class="button-label">Buscar</div>
            </div>
            <div class="section">
                <div class="button-label">Limpar</div>
            </div>
            <div class="section">
                <div class="button-label">Atualizar</div>
                <div class="section-icon">
                    <div class="button">
                        <div class="button-icon"></div>
                    </div>
                </div>
            </div>
            <div class="update-button">Atualizar</div>
        </div>
    </div>
</body>
</html>



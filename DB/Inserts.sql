-- Raças
INSERT INTO raca (nome) VALUES 
('Nelore'), 
('Angus'), 
('Brahman'), 
('Gir'), 
('Guzerá'),
('Senepol'), 
('Tabapuã'), 
('Caracu'), 
('Canadense'), 
('Hereford'),
('Brangus'),
('Normando'),
('Senepol'),
('Santa Gertrudis'),
('Girolando'),
('Guernsey'),
('Braford'),
('Murray Grey'),
('Romagnola'),
('Holandês');

-- Lotes
INSERT INTO lote (descricao) VALUES 
('Lote 1 - Área A'), ('Lote 2 - Área B'), ('Lote 3 - Área C'), ('Lote 4 - Área D'), ('Lote 5 - Área E'),
('Lote 6 - Área F'), ('Lote 7 - Área G'), ('Lote 8 - Área H'), ('Lote 9 - Área I'), ('Lote 10 - Área J');

-- Fornecedores
INSERT INTO fornecedor (nome, telefone, email) VALUES 
('Fornecedor A', '99999-0001', 'a@fornecedor.com'),
('Fornecedor B', '99999-0002', 'b@fornecedor.com'),
('Fornecedor C', '99999-0003', 'c@fornecedor.com'),
('Fornecedor D', '99999-0004', 'd@fornecedor.com'),
('Fornecedor E', '99999-0005', 'e@fornecedor.com'),
('Fornecedor F', '99999-0006', 'f@fornecedor.com'),
('Fornecedor G', '99999-0007', 'g@fornecedor.com'),
('Fornecedor H', '99999-0008', 'h@fornecedor.com'),
('Fornecedor I', '99999-0009', 'i@fornecedor.com'),
('Fornecedor J', '99999-0010', 'j@fornecedor.com');

-- Categorias (Tipos de Produto)
INSERT INTO categoria (nome) VALUES 
('Ração'), ('Medicamento'), ('Vacina'), ('Suplemento'), ('Equipamento'),
('Ferramenta'), ('Higiene'), ('Tratamento'), ('Alimento'), ('Outros');

-- Produtos
INSERT INTO produto (nome, id_categoria) VALUES 
('Ração Premium', 1), ('Vermífugo Bovino', 2), ('Vacina Aftosa', 3),
('Suplemento Mineral', 4), ('Cocho Plástico', 5), ('Seringa', 6),
('Shampoo Veterinário', 7), ('Pomada Anti-inflamatória', 8),
('Silagem de Milho', 9), ('Caminhão de Transporte', 10);

-- Compras
INSERT INTO compra (data, id_fornecedor) VALUES 
('2025-04-08', 1), ('2025-04-08', 2), ('2025-04-08', 3),
('2025-04-08', 4), ('2025-04-08', 5), ('2025-04-08', 6),
('2025-04-08', 7), ('2025-04-08', 8), ('2025-04-08', 9),
('2025-04-08', 10);

-- Itens de Compra
INSERT INTO item_compra (id_compra, id_produto, quantidade, preco_unitario) VALUES 
(1, 1, 5, 120.00), (2, 2, 10, 35.50), (3, 3, 8, 42.00), (4, 4, 3, 98.90),
(5, 5, 2, 230.00), (6, 6, 6, 15.00), (7, 7, 4, 22.00), (8, 8, 7, 58.00),
(9, 9, 10, 18.50), (10, 10, 1, 1550.00);

-- Manejos
INSERT INTO manejo (data, descricao, id_lote) VALUES 
('2025-04-08', 'Vacinação contra febre aftosa', 1),
('2025-04-08', 'Aplicação de vermífugo', 2),
('2025-04-08', 'Revisão de cochos', 3),
('2025-04-08', 'Suplementação alimentar', 4),
('2025-04-08', 'Higienização da área de pasto', 5),
('2025-04-08', 'Aplicação de carrapaticida', 6),
('2025-04-08', 'Transporte para área nova', 7),
('2025-04-08', 'Avaliação de saúde', 8),
('2025-04-08', 'Recolhimento para vacinação', 9),
('2025-04-08', 'Pesar os animais', 10);

-- Animais (sem mãe para simplificar)
INSERT INTO animal (identificador, data_nascimento, sexo, id_raca, id_lote) VALUES 
('9401', '2022-01-10', 'M', 1, 1),
('9402', '2021-02-15', 'F', 2, 2),
('9403', '2020-03-20', 'F', 3, 3),
('9404', '2021-04-25', 'F', 4, 4),
('9405', '2022-05-30', 'F', 5, 5),
('9406', '2021-06-05', 'F', 6, 6),
('9407', '2020-07-10', 'F', 7, 7),
('9408', '2022-08-15', 'F', 8, 8),
('9409', '2021-09-20', 'F', 9, 9),
('9410', '2024-10-25', 'M', 10, 10);

INSERT INTO animal (identificador, data_nascimento, sexo, id_raca, id_mae, id_lote)
VALUES 
('E2003412012345678920', '2025-01-10', 'F', 1, 3, 1),
('E2003412012345678921', '2025-02-14', 'M', 2, 4, 2),
('E2003412012345678922', '2025-03-20', 'F', 3, 6, 3),
('E2003412012345678923', '2025-04-18', 'M', 1, 7, 1),
('E2003412012345678924', '2024-05-25', 'F', 2, 9, 2);


-- nutricao


INSERT INTO nutricao (fase_produtiva, titulo, descricao, autor) VALUES
('Bezerro em aleitamento', 'Colostro nas primeiras horas', 
'O fornecimento de colostro nas primeiras horas de vida do bezerro é considerado a prática nutricional mais importante para garantir a sobrevivência e o bom desenvolvimento do animal. O colostro é rico em imunoglobulinas, que conferem ao recém-nascido a imunidade passiva necessária para enfrentar os primeiros desafios ambientais e patogênicos. O ideal é que o bezerro consuma de 4 a 6 litros de colostro dentro das primeiras 6 horas de vida, com a primeira mamada ocorrendo preferencialmente até 2 horas após o nascimento. Além da quantidade, a qualidade do colostro deve ser observada, verificando-se a densidade e o teor de anticorpos. Outro ponto fundamental é a higiene durante o fornecimento, já que colostro contaminado pode causar diarreias e comprometer a absorção de nutrientes. O manejo adequado desta prática tem reflexo direto na saúde, na taxa de ganho de peso e no desempenho futuro do animal dentro do sistema de produção, reduzindo mortalidade e aumentando a eficiência da criação.', 
'Dr. João Almeida'),

('Bezerro em aleitamento', 'Fornecimento de água limpa', 
'A presença de água limpa e fresca à disposição dos bezerros em fase de aleitamento é um fator frequentemente negligenciado, mas que exerce papel determinante no desenvolvimento saudável. Mesmo quando o leite é fornecido de forma regular, a água é essencial para o funcionamento adequado do rúmen, órgão que começa a se desenvolver logo após o nascimento. Estudos mostram que bezerros com acesso contínuo à água de qualidade apresentam melhor consumo de concentrados, maior desenvolvimento do trato digestivo e, consequentemente, maior ganho de peso. É fundamental que a água esteja livre de contaminantes e seja oferecida em recipientes adequados, que sejam de fácil acesso e higienizados diariamente. A falta de água ou o fornecimento de água de baixa qualidade pode comprometer a saúde intestinal, aumentar a incidência de diarreias e reduzir a eficiência alimentar. Portanto, garantir a disponibilidade de água desde os primeiros dias de vida é um investimento simples, mas altamente eficaz no desempenho futuro dos animais.', 
'Maria Ferreira'),

('Bezerro em desmama', 'Suplementação energética', 
'A fase de desmama é um dos períodos mais críticos na vida do bovino, marcada por estresse, mudanças alimentares e redução temporária do consumo voluntário. Nessa etapa, a suplementação energética torna-se essencial para garantir a manutenção do ganho de peso e evitar atrasos no desenvolvimento. Recomenda-se oferecer uma dieta de crescimento com cerca de 16% de proteína bruta e adequada densidade energética, balanceada entre volumoso e concentrado. O uso de rações comerciais específicas ou de misturas caseiras bem formuladas contribui para atender as exigências nutricionais. Além disso, a introdução gradual do suplemento, associada a práticas de manejo que reduzam o estresse (como o desmame fatiado ou em etapas), minimiza perdas de peso e melhora a adaptação do animal. A suplementação energética adequada não apenas garante crescimento contínuo, como também prepara os bezerros para a fase seguinte de recria, proporcionando um rebanho mais uniforme e produtivo no futuro.', 
'Carlos Nogueira'),

('Bezerro em desmama', 'Redução do estresse', 
'O estresse durante a desmama é um dos principais fatores que impactam negativamente a saúde e o desempenho dos bezerros. Quando o processo ocorre de forma abrupta, os animais sofrem queda acentuada no consumo de alimentos, aumento da suscetibilidade a doenças respiratórias e redução do ganho de peso. Para minimizar esses efeitos, recomenda-se adotar práticas de desmama gradual, como o desmame em duas etapas, onde se retira apenas o contato de amamentação, mantendo o bezerro próximo à mãe por alguns dias. Outra alternativa é o desmame em lotes separados por cercas, permitindo que os animais mantenham contato visual e olfativo com as vacas. Além disso, garantir uma boa adaptação prévia ao consumo de alimentos sólidos, com suplementação adequada, é fundamental para reduzir o impacto. A redução do estresse não apenas melhora a saúde imediata dos animais, mas também influencia positivamente todo o seu desempenho futuro, contribuindo para maior eficiência do sistema produtivo.', 
'Dr. João Almeida'),

('Novilho em recria', 'Pastagem de qualidade', 
'A recria é uma fase estratégica na pecuária de corte, pois representa o período em que o animal precisa manter ganhos de peso consistentes com menor custo de produção. A base nutricional dessa etapa é a pastagem, que deve ser manejada de forma eficiente para garantir qualidade e disponibilidade ao longo do ano. O uso de práticas como o pastejo rotacionado, a adubação adequada e a escolha de espécies forrageiras adaptadas à região são fatores decisivos para o sucesso. Pastagens bem manejadas oferecem proteína e energia suficientes para ganhos médios diários satisfatórios, mas em períodos críticos, como a seca, pode ser necessário complementar a dieta com suplementos minerais e proteicos. Investir em pastagem de qualidade não apenas reduz custos com concentrados, mas também melhora a sustentabilidade do sistema, aproveitando os recursos naturais de forma racional e garantindo desenvolvimento uniforme dos animais na recria.', 
'Maria Ferreira'),

('Novilho em recria', 'Suplementação proteica na seca', 
'O período seco é um desafio nutricional significativo, principalmente em regiões tropicais, onde a qualidade e a quantidade da forragem diminuem drasticamente. Nesse contexto, a suplementação proteica é fundamental para manter a atividade microbiana do rúmen e, consequentemente, o aproveitamento da fibra disponível. Fornecer suplementos com níveis adequados de proteína bruta ajuda os animais a continuarem ganhando peso, mesmo em condições adversas. Estratégias como o fornecimento de ureia protegida ou suplementos múltiplos, que combinam proteína, minerais e energia, têm mostrado bons resultados. Além do desempenho zootécnico, essa prática contribui para reduzir a idade de abate e melhorar a taxa de lotação das pastagens, aumentando a eficiência do sistema como um todo. Dessa forma, investir em suplementação proteica na seca é essencial para assegurar a continuidade do crescimento dos novilhos na fase de recria.', 
'Carlos Nogueira'),

('Novilho em engorda', 'Confinamento balanceado', 
'O confinamento é uma estratégia utilizada para acelerar a terminação de bovinos, garantindo carcaças de qualidade em menor tempo. Entretanto, para que essa prática seja eficiente, a dieta deve ser cuidadosamente balanceada. Um dos principais riscos é o fornecimento excessivo de grãos, que pode levar à acidose ruminal, comprometendo a saúde e o desempenho dos animais. A dieta ideal deve equilibrar volumoso e concentrado, assegurando níveis adequados de fibra efetiva para estimular a mastigação e a produção de saliva, que atua como tamponante natural. O uso de forragens conservadas, como silagem de milho, associadas a grãos e suplementos minerais, garante densidade energética elevada e adequada conversão alimentar. Além disso, o acompanhamento técnico é indispensável para ajustes frequentes na formulação da dieta, considerando peso, ganho médio diário e condições ambientais. Um confinamento bem planejado resulta em maior rentabilidade e carne de qualidade superior.', 
'Dr. João Almeida'),

('Novilho em engorda', 'Uso de aditivos', 
'Os aditivos nutricionais desempenham papel cada vez mais importante nos sistemas de engorda, especialmente em confinamento, onde o objetivo é otimizar o desempenho e reduzir riscos sanitários. Ionóforos, por exemplo, aumentam a eficiência alimentar ao modificar a fermentação ruminal, resultando em maior produção de propionato, que é uma fonte de energia mais eficiente para o animal. Tamponantes como bicarbonato de sódio ajudam a prevenir distúrbios metabólicos relacionados à acidose. Além disso, probióticos e leveduras vivas têm sido utilizados para estabilizar a microbiota ruminal e melhorar a digestibilidade da fibra. O uso de aditivos deve ser sempre orientado por profissionais, considerando a legislação vigente e os objetivos produtivos. Quando aplicados de forma estratégica, eles representam um investimento com retorno rápido, reduzindo perdas e aumentando a produtividade do rebanho na fase final de engorda.', 
'Maria Ferreira'),

('Vaca em lactação', 'Alta demanda nutricional', 
'A fase de lactação é a de maior exigência nutricional para a vaca de corte, pois além de manter suas funções vitais, o animal precisa produzir leite em quantidade e qualidade suficientes para o desenvolvimento saudável do bezerro. Nessa etapa, é fundamental fornecer uma dieta rica em energia e proteína, de modo a evitar perda excessiva de peso corporal e garantir boa fertilidade no futuro. A base alimentar deve ser composta por forragens de qualidade, complementadas por concentrados energéticos como milho ou sorgo, além de fontes proteicas adequadas. É importante observar o escore de condição corporal, evitando que a vaca entre em balanço energético negativo prolongado, situação que compromete tanto a produção de leite quanto a eficiência reprodutiva. Um manejo nutricional adequado durante a lactação impacta diretamente na saúde da matriz e no desempenho do bezerro, sendo peça-chave para a rentabilidade da pecuária de corte.', 
'Carlos Nogueira'),

('Vaca em lactação', 'Suplementação mineral', 
'O fornecimento de minerais em quantidades e proporções adequadas é indispensável para vacas em lactação, já que a produção de leite representa uma elevada saída de nutrientes, especialmente cálcio e fósforo. A deficiência desses minerais pode levar a distúrbios metabólicos, queda na produção de leite e comprometimento da fertilidade. O cálcio é essencial para a contração muscular e para a formação do leite, enquanto o fósforo participa de processos energéticos fundamentais. Além deles, microminerais como zinco, cobre e selênio também exercem funções relevantes no sistema imunológico e na reprodução. O uso de misturas minerais balanceadas, adaptadas às condições da região e ao tipo de dieta, garante maior eficiência produtiva. Uma suplementação mineral bem conduzida não apenas melhora o desempenho da vaca durante a lactação, mas também contribui para prolongar sua vida útil e aumentar o retorno econômico do rebanho.', 
'Dr. João Almeida'),

('Vaca seca', 'Controle da dieta', 
'O período seco é decisivo para a saúde e produtividade da vaca no próximo ciclo, e o controle da dieta nessa fase é determinante para evitar problemas metabólicos no parto e no início da lactação. O principal cuidado é evitar excesso de energia, que pode levar ao acúmulo de gordura corporal e predispor à cetose e à dificuldade no parto. A dieta deve priorizar volumosos de boa qualidade e baixo teor energético, complementados com minerais essenciais. Além disso, é importante monitorar o escore de condição corporal, mantendo-o entre 3 e 3,5 em uma escala de 1 a 5. Esse equilíbrio garante que a vaca entre no parto com reservas adequadas, mas sem sobrepeso. A adoção de estratégias como o fornecimento de dietas aniônicas pode ajudar a prevenir a hipocalcemia. Em resumo, o controle da dieta durante o período seco é uma das medidas mais eficazes para assegurar boa saúde, desempenho reprodutivo e longevidade das matrizes.', 
'Maria Ferreira'),

('Vaca seca', 'Preparação para lactação', 
'A preparação nutricional da vaca seca para a próxima lactação envolve cuidados específicos com minerais e vitaminas que terão impacto direto no desempenho do animal após o parto. O fornecimento adequado de cálcio e magnésio é essencial para reduzir o risco de hipocalcemia, também conhecida como febre do leite. Além disso, vitaminas do complexo B e vitamina E desempenham papel relevante na imunidade e na recuperação pós-parto. O balanceamento da dieta deve considerar tanto a composição da forragem disponível quanto o uso de suplementos específicos, garantindo que a vaca entre no parto com reservas adequadas. Outro ponto de destaque é a adaptação gradual da microbiota ruminal para a dieta mais rica em energia que será fornecida na lactação, evitando distúrbios metabólicos. Esse manejo cuidadoso assegura não apenas a saúde da matriz, mas também melhor qualidade do colostro e maior desempenho produtivo no novo ciclo.', 
'Carlos Nogueira'),

('Vaca prenhe', 'Nutrição no terço final da gestação', 
'O terço final da gestação é a fase em que ocorre o maior desenvolvimento fetal, aumentando significativamente as exigências nutricionais da vaca. Nesse período, é fundamental fornecer uma dieta com bom aporte energético e proteico para garantir o crescimento adequado do bezerro, sem comprometer a saúde da matriz. O fornecimento de forragens de alta qualidade, complementadas por concentrados, assegura que as necessidades sejam atendidas. Minerais como cálcio, fósforo e magnésio também desempenham papel fundamental na formação óssea e no metabolismo materno. Além disso, a suplementação com vitaminas A, D e E é recomendada para fortalecer a imunidade e melhorar a viabilidade do bezerro ao nascimento. O manejo inadequado da nutrição nesse estágio pode resultar em bezerros fracos, partos difíceis e queda na fertilidade pós-parto. Portanto, uma atenção especial à dieta no terço final da gestação é indispensável para o sucesso reprodutivo e produtivo do rebanho.', 
'Dr. João Almeida'),

('Vaca prenhe', 'Evitar perda de condição corporal', 
'Manter um escore de condição corporal adequado durante a gestação é essencial para garantir um parto saudável e uma lactação eficiente. A perda excessiva de reservas corporais compromete tanto a saúde da vaca quanto o desenvolvimento do bezerro. Animais muito magros podem apresentar dificuldade no parto, baixa produção de leite e redução da taxa de concepção em ciclos futuros. Por outro lado, vacas que chegam ao parto com excesso de peso estão mais propensas a distúrbios metabólicos, como a cetose e a hipocalcemia. A dieta deve, portanto, ser ajustada de forma a manter o equilíbrio energético, priorizando volumosos de boa qualidade e suplementação mineral adequada. O acompanhamento regular do escore corporal, aliado ao manejo nutricional estratégico, previne problemas e assegura maior eficiência produtiva. Esse cuidado simples, mas fundamental, contribui para reduzir custos veterinários e aumentar a longevidade do rebanho.', 
'Maria Ferreira'),

('Touro reprodutor', 'Manutenção da fertilidade', 
'A nutrição de touros reprodutores deve ser cuidadosamente planejada, pois impacta diretamente na qualidade do sêmen e na eficiência reprodutiva do rebanho. Minerais como zinco, selênio e cobre desempenham papel fundamental na espermatogênese, influenciando tanto a quantidade quanto a motilidade dos espermatozoides. Além disso, vitaminas antioxidantes, como a vitamina E, ajudam a proteger as células espermáticas contra danos oxidativos. A dieta deve fornecer energia suficiente para manter o escore corporal adequado, evitando tanto a perda excessiva de peso quanto o acúmulo de gordura, que pode reduzir a libido. O fornecimento de pastagens de qualidade, associado a suplementação mineral específica, garante o equilíbrio necessário. Um touro bem nutrido apresenta maior longevidade produtiva, reduzindo custos com reposição e aumentando a taxa de prenhez do rebanho. Portanto, investir na nutrição adequada dos reprodutores é uma estratégia fundamental para a sustentabilidade e rentabilidade da pecuária de corte.', 
'Carlos Nogueira');
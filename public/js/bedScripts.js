const initDeleteModalBtns = () => {
    const modal = document.querySelector('.delete-modal');
    if (!modal) return;

    const deleteBtns = document.querySelectorAll('.js-delete-post');
    const modalContent = document.querySelector('.delete-modal__content');
    const submitBtn = modal.querySelector('.js-post-delete-submit');
    const cancelBtn = modal.querySelectorAll('.js-post-delete-cancel');
    const confirmContent = modal.querySelector('.delete-modal__confirm');
    const successContent = modal.querySelector('.delete-modal__success');
    let postId;

    const toggleShowModal = ({ hide, id }) => {
        modal.classList[hide ? 'add' : 'remove']('display-none');
        document.body.style.overflow = hide ? 'auto' : 'hidden';
        postId = id || null;
    };

    const toggleModalContent = (confirm) => {
        if (confirm) {
            successContent.classList.add('display-none');
            confirmContent.classList.remove('display-none');
        } else {
            successContent.classList.remove('display-none');
            confirmContent.classList.add('display-none');
        }
    };

    modalContent.addEventListener('click', (e) => e.stopPropagation());
    modal.addEventListener('click', () =>
      toggleShowModal({ hide: true, id: null })
    );

    deleteBtns.forEach((btn) =>
      btn.addEventListener('click', () => {
          toggleModalContent(true);
          toggleShowModal({ hide: false, id: btn.id });
      })
    );

    submitBtn.addEventListener('click', async () => {
        const { data } = await API.deletePost(postId);
        const status = data.data.status;

        if (status === 'success') {
            toggleModalContent();
        } else {
            const errMsg = data.data.message;
            // error
        }
    });

    cancelBtn.forEach((btn) => {
        btn.addEventListener('click', () => {
            toggleShowModal({ hide: true, id: null });
        });
    });
}

const initShowMoreComments = () => {
    const posts = document.querySelectorAll('.js-post');

    if (!posts) return;

    const handleComments = (element) => {
        const moreBtn = element.querySelectorAll('.js-comments-more');
        const commentsBody = element.querySelector('.js-comments-body');
        const allComments = element.querySelectorAll('.post__comment');

        if (allComments?.length <= 3) {
            const showMoreBtn = element.querySelector('.js-comments-more');
            showMoreBtn && showMoreBtn.remove();
            return;
        }

        if (!moreBtn || !commentsBody) return;

        const comments = [...commentsBody.children];

        moreBtn.forEach((btn) =>
          btn.addEventListener('click', () => {
              comments.forEach((comment) => {
                  comment.classList.toggle('comment--show');

                  const commentsClasses = [...comment.classList];
                  const isShow = commentsClasses.includes('comment--show');

                  const showComment = window.innerWidth <= 740 ? '' : ' комментарии';
                  btn.innerHTML = (isShow ? 'Скрыть' : '👀 Читать все') + showComment;
              });
          })
        );
    };

    posts.forEach((post) => handleComments(post));
}

const initCommentSmiles = () => {
    // const truncateText = new Cuttr('.js-post-text', {
    //     truncate: 'characters',
    //     length: 150,
    //     ending: '...',
    //     readMore: true,
    //     readMoreText: 'Прочитать полностью',
    //     readLessText: 'Скрыть',
    //     readMoreBtnAdditionalClasses:
    //       'js-post-more button button--outlined post__btn',
    //     readMoreBtnPosition: 'inside',
    // });

    const commentForms = document.querySelectorAll('.comments__footer');
    if (!commentForms) return;
    let CaretPos = null;

    commentForms &&
    commentForms.forEach((form) => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
        });
    });

    const getCursorPosition = (inputItem) => {
        if (document.selection) {
            inputItem.focus();

            const Sel = document.selection.createRange();

            Sel.moveStart('character', -inputItem.value.length);

            CaretPos = Sel.text.length;
        } else if (inputItem.selectionStart || inputItem.selectionStart == '0') {
            CaretPos = inputItem.selectionStart;
        }
        return CaretPos;
    };

    commentForms &&
    commentForms.forEach((el) => {
        const emojies = el.querySelectorAll('.post-emoji-js');
        const input = el.querySelector('.comments-input-js');

        input &&
        input.addEventListener('click', (e) => {
            e.stopPropagation();
            getCursorPosition(e.target);
        });

        input &&
        emojies &&
        emojies.forEach((emojy) => {
            emojy.addEventListener('click', (e) => {
                const smile = e.target.innerText;
                const currentText = input.value;

                if (!CaretPos && CaretPos !== 0) {
                    input.value = currentText + smile;
                } else {
                    let updatedMsg = currentText.split('');
                    updatedMsg = [
                        ...updatedMsg.slice(0, CaretPos),
                        smile,
                        ...updatedMsg.slice(CaretPos),
                    ].join('');

                    CaretPos = CaretPos + 2;
                    input.value = updatedMsg;
                }
            });
        });
    });
}

const playAudio = async (audioUrl) => {
  if ('AudioContext' in window || 'webkitAudioContext' in window) {
      const play = (audioBuffer) => {
          const source = context.createBufferSource();
          source.buffer = audioBuffer;
          source.connect(context.destination);
          source.start();
      };

      const context = new (window.AudioContext || window.webkitAudioContext)();
      const gainNode = context.createGain();
      gainNode.gain.value = 1;
      const arrayBuffer = await (await fetch(audioUrl)).arrayBuffer();

      context.decodeAudioData(
          arrayBuffer,
          (audioBuffer) => {
              play(audioBuffer);
          },
          (error) => console.error(error)
      );
  }
};

const createElem = (el) => {
  const div = document.createElement('div');
  const showHints = localStorage.getItem('audioHints');

  div.classList.add('js-audio-hint');

  if (showHints === 'off') {
      div.classList.add('display-none');
  }

  el.append(div);

  div.addEventListener('click', async (e) => {
      e.preventDefault();
      e.stopPropagation();

      const updatedEl = el.cloneNode(true);

      const hint = updatedEl.querySelector('.js-hint');
      const subLabel = updatedEl.querySelector('.file-label__text-sub');

      hint && hint.remove();
      subLabel && subLabel.remove();

      const text = updatedEl.textContent.toString().trim();

      const BASE_URL = window.location.origin;
      const url = BASE_URL + `/api/v1/voice.MakeTransformation?text=${text}`;
      const { data } = await (await fetch(url)).json();

      playAudio(BASE_URL + data);
  });
};

$(document).ready(function(){
    $(document).on('click', '.load-more-items', function(){
      var targetContainer = $('.items-list'),
          url =  $('.load-more-items').attr('data-url');
      if (url !== undefined) {
          $.ajax({
              type: 'GET',
              url: url,
              dataType: 'html',
              success: function(data){
                  $('.load-more-items').remove();
                  var elements = $(data).find('.item-content'),
                      pagination = $(data).find('.load-more-items');

                  targetContainer.append(elements);
                  $('#pag').append(pagination);
                
                  setTimeout(() => {
                      const audioElements = targetContainer.find('.js-audio');
                      if (!audioElements) return;
                      [...audioElements].forEach((el) => createElem(el));
                }, 500);
              }
          });
      }
    });

    $(document).on('click', '.post-load-more-items', function(){
        var targetContainer = $('.post-items-list'),
            url =  $('.post-load-more-items').attr('data-url');
        if (url !== undefined) {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data){
                    $('.post-load-more-items').remove();
                    var elements = $(data).find('.post-item-content'),
                        pagination = $(data).find('.post-load-more-items');

                    targetContainer.append(elements);
                    $('#post-pag').append(pagination);

                    setTimeout(() => {
                        const audioElements = targetContainer.find('.js-audio');
                        if (audioElements) {
                            [...audioElements].forEach((el) => createElem(el));
                        }
                    }, 500)
                }
            });
        }
    });

    $(document).on('click', '.like-load-more-items', function(){
        var targetContainer = $('.like-items-list'),
            url =  $('.like-load-more-items').attr('data-url');
        if (url !== undefined) {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data){
                    $('.like-load-more-items').remove();
                    var elements = $(data).find('.like-item-content'),
                        pagination = $(data).find('.like-load-more-items');

                    targetContainer.append(elements);
                    $('#like-pag').append(pagination);
                    

                    setTimeout(() => {
                        const audioElements = targetContainer.find('.js-audio');
                        if (!audioElements) {
                            [...audioElements].forEach((el) => createElem(el));
                        }
                    }, 500)
                }
            });
        }
    });

    $(document).on('click', '.comment-load-more-items', function(){
        var targetContainer = $('.comment-items-list'),
            url =  $('.comment-load-more-items').attr('data-url');
        if (url !== undefined) {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data){
                    $('.comment-load-more-items').remove();
                    var elements = $(data).find('.comment-item-content'),
                        pagination = $(data).find('.comment-load-more-items');

                    targetContainer.append(elements);
                    $('#comment-pag').append(pagination);
                    setTimeout(() => {
                        const audioElements = targetContainer.find('.js-audio');
                        if (audioElements) {
                            [...audioElements].forEach((el) => createElem(el));
                        }
                    }, 500)
                }
            });
        }
    });
});

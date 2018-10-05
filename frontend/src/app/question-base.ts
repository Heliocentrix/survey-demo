export class QuestionBase<T> {
  id: number;
  survey_id: number;
  title: T;
  question_type: string;
  option_name: T;
  question_category: string;
  sort_order: number;
  status: string;
  update_at: string;
  created_at: string;
  options: any;

  constructor(options: {
    id?: number,
    question_id?: number,
    text?: T,
    status?: string,
    update_at?: string,
    created_at?: string,

    } = {}) {
    this.id = options.question_id;
  }
}
